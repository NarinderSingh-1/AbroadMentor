<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocType;
use App\Document;
use App\Http\Api\Artemis;
use App\VerifyRequest;
use Log;
use App\Setting;

class DocumentController extends Controller {

    private $returnUrl = 'profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Upload files
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request) {
        $response = ['docStatus' => false];
        $fileType = '';


        // Front
        if ($request->hasFile('front')) {
            $fileType = 'front';
            $frontFile = $this->s3UploadFile($request, $fileType);
            $response = $this->response($frontFile);
        }

        // Holding
        if ($request->hasFile('back')) {
            $fileType = 'back';
            $holdingFile = $this->s3UploadFile($request, $fileType);
            $response = $this->response($holdingFile);
        }

        // Residence
        if ($request->hasFile('holding')) {
            $fileType = 'holding';
            $residenceFile = $this->s3UploadFile($request, $fileType);
            $response = $this->response($residenceFile);
        }

        $documents = Document::getUploadedDocs(currentUser()->id);
        if ($documents) {
            foreach ($documents as $document) {
                if ($fileType == $document['name']) {
                    $response['docStatus'] = documentResponse($document);
                    break;
                }
            }
        }

        return response()->json($response);
    }

    public function deleteFile(Request $request, $id, $hash) {
        $document = $this->validateDoc($id, $hash);

        try {
            $document->delete();
        } catch (\Exception $e) {
            Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return redirect($this->returnUrl)->with('error', $this->response($this->success('Document deleted successfully')));
    }

    public function viewFile(Request $request, $id, $hash) {
        try {
            $document = $this->validateDoc($id, $hash);

            return '<img src="' . url("document/get/{$id}/{$hash}") . '" />';
        } catch (\Exception $e) {
            return $document;
        }
    }

    public function getFile(Request $request, $id, $hash) {
        try {
            $document = $this->validateDoc($id, $hash);
            $content = $this->s3Get($document->path);

            if (strstr($document->path, '.pdf')) {
                return response($content, 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Description' => 'File Transfer',
                    'Content-Disposition' => "attachment; filename=" . uniqid() . '.pdf',
                    'Content-Transfer-Encoding' => 'binary',
                ]);
            }

            return $content;
        } catch (\Exception $e) {
            return $document;
        }
    }

    public function getFileUrl(Request $request, $id, $hash) {
        if (getHash($id) != $hash) {
            return redirect($this->returnUrl)->with('error', $this->response($this->error('Sorry! no cheating')));
        }

        try {
            $document = Document::where('id', $id)->first();
            return $this->s3Get($document->path);
        } catch (\Exception $e) {
            Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return false;
    }

    private function validateDoc($id, $hash) {
        if (getHash($id) != $hash) {
            return redirect($this->returnUrl)->with('error', $this->response($this->error('Sorry! no cheating')));
        }

        $document = Document::where('id', $id)
                ->where('user_id', currentUser()->id)
                ->first();

        if (!$document) {
            return redirect($this->returnUrl)->with('error', $this->response($this->error('Document not found')));
        }

        return $document;
    }

    public function error($error) {
        return ['result' => false, 'message' => $error];
    }

    public function success($msg, $data = null) {
        return ['result' => true, 'message' => $msg, 'data' => $data];
    }

    public function response($response) {
        return [
            'type' => $response['result'] ? 'green' : 'red',
            'message' => $response['message']
        ];
    }

    public function validateFile(Request $request, $type) {
        $error = '';
        if (!$request->hasFile($type)) {
            return $this->error('Document is required');
        }

        $file = $request->file($type);

        $allowedFiles = [
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'pdf' => 'application/pdf'
        ];

        $extension = strtolower($file->getClientOriginalExtension());
        $mimeType = $file->getClientMimeType();

        // Check fileType Mime and extension
        if (!in_array($mimeType, array_values($allowedFiles)) || !array_key_exists($extension, $allowedFiles)) {
            $error = 'You can upload document format of .png, .jpg, .jpeg and .pdf only.';
        }

        $format = 'You can upload document in .png, .jpeg, .jpg or .pdf formats of max 5MB size only.';
        $fileSize = $file->getClientSize();
        if ($fileSize > 5242880) { // Limit of 5 MB size
            $error = $format;
        }

        if (!empty($error)) { // Return if there is an error
            return $this->error($error);
        }

        return $this->success('', $file);
    }

    public function s3UploadFile(Request $request, $docType) {
        $response = $this->validateFile($request, $docType);
        if (!$response['result']) {
            return $response;
        }

        return $this->s3Put($request->file($docType), $docType);
    }

    public function s3Put($file, $docType) {
        $s3 = \Storage::disk('s3');
        $filePath = $docType . '/user' . currentUser()->id . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        if ($s3->exists($filePath)) {
            return $this->error('File already exists');
        }

        try {
            $fileContent = file_get_contents($file->getRealPath());
            if ($s3->put($filePath, $fileContent)) {
                $docResponse = $this->addDocument(substr($file->getClientOriginalName(), 0, 64), $docType, $filePath);
                return !$docResponse['result'] ? $docResponse : $this->success('File uploaded successfully');
            }
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return $this->error('There is some with S3');
    }

    public function s3Delete($path) {
        $s3 = \Storage::disk('s3');
        if (!$s3->exists($path)) {
            return $this->error('File not exists');
        }

        return $s3->delete($path);
    }

    public function s3Get($path) {
        $s3 = \Storage::disk('s3');
        if (!$s3->exists($path)) {
            return $this->error('File not exists');
        }

        return $s3->get($path);
    }

    public function getDownloadFile(Request $request, $id, $hash) {
        if ($hash != getHash($id)) {
            return redirect('news')->with('alertError', alert(false, 'Invalid token'));
        }

        try {
            $document = Document::where('id', $id)->first();
            $content = $this->s3Get($document->path);

            if (strstr($document->path, '.pdf')) {
                return response($content, 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Description' => 'File Transfer',
                    'Content-Disposition' => "attachment; filename=" . uniqid() . '.pdf',
                    'Content-Transfer-Encoding' => 'binary',
                ]);
            }

            return response($content, 200, [
                'Content-Type' => 'image/png',
                'Content-Description' => 'File Transfer',
                'Content-Disposition' => "attachment; filename=" . uniqid() . '.png',
                'Content-Transfer-Encoding' => 'binary',
            ]);
        } catch (\Exception $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
            dd($ex->getMessage());
        }

        return response()->back()->with('alert', alert(false, 'Download file'));
    }

    public function addDocument($name, $type, $path) {
        $docType = DocType::select('id')->where('name', $type)->first();
        if (!$docType) {
            return $this->error('Document type not found');
        }

        $document = new Document();
        $document->user_id = currentUser()->id;
        $document->name = $name;
        $document->path = $path;
        $document->status_id = 1;
        $document->doc_type_id = $docType->id;
        $document->save();

        $document->rfr_id = "doc{$document->id}rfrid" . uniqid();
        $document->save();

        return $this->success('Document added successfully');
    }

    public function eligibilityCheck() {
        $currentUser = currentUser();
        $documents = Document::getUploadedDocs($currentUser->id);
        if (empty($documents) || count($documents) != 3) {
            return false;
        }

        $validator = \Validator::make([
                    'country_id' => $currentUser->country,
                    'dob' => $currentUser->dob,
                    'nationality_id' => $currentUser->nationality,
                    'gender' => $currentUser->gender,
                    'last_name' => $currentUser->last_name,
                    'first_name' => $currentUser->first_name,
                    'national_id' => $currentUser->national_id,
                    'wallet_address' => $currentUser->wallet_address,
                    'address' => $currentUser->address
                        ], [
                    'country_id' => 'required',
                    'dob' => 'required',
                    'nationality_id' => 'required',
                    'gender' => 'required',
                    'last_name' => 'required',
                    'first_name' => 'required',
                    'national_id' => 'required',
                    'wallet_address' => 'required',
                    'address' => 'required']);
        if ($validator->fails()) {
            return false;
        }

        return true;
    }

    public function verifyRequest($userId, $skipDocs = false) {

        $userMeta = \App\UserMeta::getMetaDetailById($userId);
        if (!$userMeta) {
            if ($skipDocs == false) {
                return redirect('profile')->with('profileAlert', alert(false, trans('user.unsufficient_profile_data')));
            } else {
                return [
                    'status' => 'fail',
                    'msg' => trans('user.unsufficient_profile_data')
                ];
            }
        }

        $verifyRequest = new VerifyRequest();
        $verifyRequest->user_id = $userId;
        $verifyRequest->save();

        $inputs = [
            'rfrID' => 'doc' . $verifyRequest->id,
            'first_name' => $userMeta->first_name,
            'last_name' => $userMeta->last_name,
            'nationality' => $userMeta->nationality,
            'country_of_residence' => $userMeta->country,
            'date_of_birth' => date('d/m/Y', strtotime($userMeta->dob)),
            'gender' => strtoupper($userMeta->gender),
            'ssic_code' => 'UNKNOWN',
            'ssoc_code' => 'UNKNOWN'
        ];

        $verifiyUpdateRequest = VerifyRequest::where('id', $verifyRequest->id)->first();
        $verifiyUpdateRequest->request = json_encode($inputs);
        $verifiyUpdateRequest->save();

        $checkApiStatus = getSetting('kyc_api_status');
        if ($checkApiStatus->value != 1 && $checkApiStatus->status != 1) {
            if ($skipDocs) {
                return [
                    'status' => 'fail',
                    'msg' => 'Cannot process request.'
                ];
            }
            
            $appUser = \App\User::where('id', $userId)->first();
            $appUser->doc_verified = config('constants.Processing');
            $appUser->kyc_status = config('constants.Fail');
            $appUser->save();

            Document::changeStatus($userId, 2);
            return [
                'status' => 'success',
                'msg' => 'Request sent successfully.'
            ];
            
        }

        $kycStatus = $jsonCode = '';

        try {
            $response = (new Artemis)->individualUser($inputs);
            $jsonCode = json_encode($response);
            $kycStatus = $response->approval_status;
            \Log::info('ArtemisResponse:' . $jsonCode);
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        $verifiyUpdateResponse = VerifyRequest::where('id', $verifyRequest->id)->first();
        $verifiyUpdateResponse->response = $jsonCode;
        $verifiyUpdateResponse->status = ($kycStatus == 'CLEARED') ? 1 : 0;
        $verifiyUpdateResponse->save();

        $appUser = \App\User::where('id', $userId)->first();
        if ($skipDocs == false) {
            $appUser->doc_verified = 2;
        }
        $appUser->kyc_status = $kycStatus == '' ? 5 : ($kycStatus == 'CLEARED' ? 4 : 3);
        $appUser->save();

        Document::changeStatus($userId, 2); // Change to processing

        if ($skipDocs == false) {
            return true;
        } else {
            return [
                'status' => 'success',
                'msg' => 'Kyc verified successfully.'
            ];
        }
    }

}
