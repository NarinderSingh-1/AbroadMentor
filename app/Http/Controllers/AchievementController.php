<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;
use App\Organisation;
use Validator;

class AchievementController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAchievement(){
        $achievement = Achievement::getAchievementList();
        
        return view('backend.achievement.index',['achievement' => $achievement]);
    }
    
    public function getAchievementForm(){
        
        return view('backend.achievement.add');
    }
    
    public function setAchievement(Request $request){
        $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required',
                    'date' => 'required',
                    
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
       
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
         
            $file = $request->file('myfile');
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getClientMimeType();

            $allowedFiles = [
                'png' => 'image/png',
                'jpg' => 'image/jpg',
                'jpeg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp'
            ];

            // Check fileType Mime and extension
            if (!in_array($mimeType, array_values($allowedFiles)) || !array_key_exists($extension, $allowedFiles)) {
                return redirect()->back()->with(alert('error', 'Invalid file type. Please upload correct one.'));
            }

            $fileSize = $file->getClientSize();
            if ($fileSize > 5242880) { // Limit of 5 MB size
                return redirect()->back()->with(alert('error', 'File size should be less or equal to 5MB only'));
            }

            $currentUser = currentUser();
            $storage = \Storage::disk('local');
            $logoUrl = 'achivements/' . md5($currentUser->id . time()) . '.' . $extension;
            $storage->put($logoUrl, file_get_contents($file->getRealPath()));
             
            $achievement = new Achievement();
            $achievement->image = $logoUrl;
            $achievement->title = $request->input('title');
            $achievement->description = $request->input('description');
            $achievement->year = $request->input('date');
            $achievement->organisation_id =  $organisation->id;
            $achievement->save();
            
        return redirect('/achievement')->with(alert('success','Achievement added successfully'));
        
    }
    
    public function editAchievement($id) {
        
        $achievement = Achievement::getAchievementById($id);
        return view('backend.achievement.edit',['achievement' =>$achievement]);
    }
    
    public function updateAchievement(Request $request){
        $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required',
                    'date' => 'required',
                    
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
       
            $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
         
            if($request->has('myfile')) {
                $file = $request->file('myfile');
                $extension = $file->getClientOriginalExtension();
                $mimeType = $file->getClientMimeType();

                $allowedFiles = [
                    'png' => 'image/png',
                    'jpg' => 'image/jpg',
                    'jpeg' => 'image/jpeg',
                    'gif' => 'image/gif',
                    'bmp' => 'image/bmp'
                ];

                // Check fileType Mime and extension
                if (!in_array($mimeType, array_values($allowedFiles)) || !array_key_exists($extension, $allowedFiles)) {
                    return redirect()->back()->with(alert('error', 'Invalid file type. Please upload correct one.'));
                }

                $fileSize = $file->getClientSize();
                if ($fileSize > 5242880) { // Limit of 5 MB size
                    return redirect()->back()->with(alert('error', 'File size should be less or equal to 5MB only'));
                }

                $currentUser = currentUser();
                $storage = \Storage::disk('local');
                $logoUrl = 'achivements/' . md5($currentUser->id . time()) . '.' . $extension;
                $storage->put($logoUrl, file_get_contents($file->getRealPath()));
            }
             
            $achievement = Achievement:: where('id',$request->input('id'))->first();
            if($request->has('myfile')) {
                $achievement->image = $logoUrl;
            }
            $achievement->title = $request->input('title');
            $achievement->description = $request->input('description');
            $achievement->year = $request->input('date');
            $achievement->organisation_id =  $organisation->id;
            $achievement->save();
            
        return redirect('/achievement')->with(alert('success','Achievement update successfully'));
        
    }
    
    public function deleteAchievement($id){
        $delete = Achievement::deleteAchievement($id);
        if(!$delete){
            return redirect('/achievement')->with(alert('error','Something went wrong'));
        }
        return redirect('/achievement')->with(alert('success','Achievement deleted successfully'));
    }
}
