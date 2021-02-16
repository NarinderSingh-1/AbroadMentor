<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visa;
use App\Organisation;
use App\Country;
use App\Exam;
use Validator;

class VisaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
       $visa = Visa::getVisaList();
       return view('backend.testimonials.index',['visa'=>$visa]);
       
   }

    public function getVisa()
    {
        $country = Country::pluck('country_name', 'id')->toArray();
        $exam = Exam::pluck('name', 'id')->toArray();
        return view('backend.testimonials.add', ['countries' => $country, 'exams' => $exam]);
    }

    public function setVisa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'city' => 'required',
            'name' => 'required',
            'exam' => 'required',
            'refusal' => 'required',
            'collage' => 'required',
            'country' => 'required',
            'profile' => 'required',
            'visa_image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }

        $profileImage = $this->uploadPic($request->file('profile'));
        $visaImage    = $this->uploadPic($request->file('visa_image'));

        $organisation = Organisation::select("id")->where('user_id', currentUser()->id)->first();

        $visa                  = new Visa();
        $visa->name            = $request->input('name');
        $visa->exam_id         = $request->input('exam');
        $visa->city            = $request->input('city');
        $visa->title           = $request->input('title');
        $visa->refuse_count    = $request->input('refusal');
        $visa->university      = $request->input('collage');
        $visa->country_id      = $request->input('country');
        $visa->photo_media_url = $profileImage;
        $visa->visa_media_url  = $visaImage;
        $visa->organisation_id = $organisation->id;
        $visa->save();

        return redirect('/testimonials')->with(alert('success', 'Visa added successfully'));
    }

    public function uploadPic($file)
    {
        $extension = $file->getClientOriginalExtension();
        $mimeType  = $file->getClientMimeType();

        $allowedFiles = [
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp'
        ];

        // Check fileType Mime and extension
        if (!in_array($mimeType, array_values($allowedFiles)) || !array_key_exists($extension,  $allowedFiles)) {
            return redirect()->back()->with(alert('error', 'Invalid file type. Please upload correct one.'));
        }

        $fileSize = $file->getClientSize();
        if ($fileSize > 5242880) { // Limit of 5 MB size
            return redirect()->back()->with(alert('error', 'File size should be less or equal to 5MB only'));
        }

        $currentUser = currentUser();
        $storage     = \Storage::disk('local');
        $logoUrl     = 'logos/'.md5($currentUser->id.time()).'.'.$extension;
        $storage->put($logoUrl, file_get_contents($file->getRealPath()));

        return $logoUrl;
    }
    
    public function editVisa($id)
    {
        $visaDetail = Visa::getVisaById($id);
        $refusal = ['1','2','3','4','5','6'];
        $country = Country::pluck('country_name', 'id')->toArray();
        $exam = Exam::pluck('name', 'id')->toArray();
        return view('backend.testimonials.edit', ['countries' => $country, 'exams' => $exam,'visa'=> $visaDetail,'refusal'=>$refusal]);
    }
    
    public function updateVisa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'city' => 'required',
            'name' => 'required',
            'exam' => 'required',
            'refusal' => 'required',
            'collage' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }
        
        if($request->has('profile')) {
            $profileImage = $this->uploadPic($request->file('profile'));
        }
        if($request->has('visa_image')) {
            $visaImage    = $this->uploadPic($request->file('visa_image'));
        }

        $organisation = Organisation::select("id")->where('user_id', currentUser()->id)->first();

        $visa                  = Visa::where('id',$request->input('id'))->first();
        $visa->name            = $request->input('name');
        $visa->title            = $request->input('title');
        $visa->exam_id         = $request->input('exam');
        $visa->city            = $request->input('city');
        $visa->refuse_count    = $request->input('refusal');
        $visa->university      = $request->input('collage');
        $visa->country_id      = $request->input('country');
        if($request->has('myfile')) {
            $visa->photo_media_url = $profileImage;
        }
        if($request->has('myfile')) {
            $visa->visa_media_url  = $visaImage;
        }
        $visa->organisation_id = $organisation->id;
        $visa->save();

        return redirect('/testimonials')->with(alert('success', 'Visa updated successfully'));
    }
    
    public function deleteVisa($id){
        $delete = Visa::deleteVisa($id);
        if(!$delete){
            return redirect('/testimonials')->with(alert('error','Something went wrong'));
        }
        return redirect('/testimonials')->with(alert('success','Visa deleted successfully'));
    }
}