<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\MentorMembership;
use App\Skill;
use Validator;
use App\Organisation;
use App\Service;
use App\MentorService;
use App\Membership;
use App\Other;

class MentorController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function getMentorList(){
        if(!currentUser()->organisation){
            return redirect('/profile')->with(alert('success','Complete your profile first'));
        } 
        $getMentorList = Mentor::getMentors();
        return view('backend.mentor.index',['mentors'=>$getMentorList]);
    }
    
    public function getMentor(){
        $getSkillList = Membership::pluck('title','id');
        $getServices  = Service::getServiceList();
        return view('backend.mentor.add',['skills'=>$getSkillList,'services'=>$getServices]);
    }
    
    public function setMentor(Request $request) {
        $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'qualification' => 'required',
                    'designation' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email',
                    'experience' => 'required',
                    'photo' => 'required',
                    'skill' => 'required',
                    'facebook_url' => 'required',
                    'about' => 'required',
                    'services' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        $file = $request->file('photo');
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
        $logoUrl = 'mentors/' . md5($currentUser->id . time()) . '.' . $extension;
        $storage->put($logoUrl, file_get_contents($file->getRealPath()));
        
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();

        $mentor = new Mentor();
        $mentor->first_name = $request->input('first_name');
        $mentor->last_name = $request->input('last_name');
        $mentor->qualification = $request->input('qualification');
        $mentor->designation = $request->input('designation');
        $mentor->phone = $request->input('phone');
        $mentor->email = $request->input('email');
        $mentor->experience = $request->input('experience');
        $mentor->photo_url = $logoUrl;
        $mentor->facebook_url = $request->input('facebook_url');
        $mentor->about = $request->input('about');
        $mentor->organisation_id = $organisation->id; 
        $mentor->save();
        
        foreach ($request->input('skill') as $value){
            $mentorMembership = new MentorMembership();
            $mentorMembership->mentor_id = $mentor->id;
            $mentorMembership->membership_id = $value;
            $mentorMembership->save();
        }
        
        foreach ($request->input('services') as $value){
            $mentorService = new MentorService();
            $mentorService->mentor_id = $mentor->id;
            $mentorService->service_id = $value;
            $mentorService->save();
        }

        $others = $request->input('others');
        if(!empty($others)) {
            $othersList = [];
            foreach($others as $value) {
                if(empty($value)) {
                    continue;
                }

                $othersList[] = ['ref_id' => $organisation->id, 'type' => 'mentors' , 'value' => $value];
            }

            Other::where('ref_id', $organisation->id)->where('type', 'mentors')->delete();
            Other::insert($othersList);
        }
        
        return redirect('/mentor')->with(alert('success','Mentor added successfully'));
    }
    
    public function getMentorDetail($id){
        $organisationId = currentUser()->organisation->id;
        $mentor = Mentor::getMentorDetail($id);
        $getSkillList = Membership::pluck('title','id');
        $getServices  = Service::getServiceList();
        
        $mentorServices=explode(",",$mentor->services);
        $mentorMembership=explode(",",$mentor->memberships);
       
        $tieupsOther = Other::select('value')->where('ref_id', $organisationId)->where('type', 'mentors')->get()->toArray();
        return view('backend.mentor.edit',['skills'=>$getSkillList,'services'=>$getServices,'mentor'=>$mentor,'mentorMembership'=>$mentorMembership,
           'mentorServices'=> $mentorServices,'otherMembership' => $tieupsOther ]);

    }
    
    public function updateMentorDetail(Request $request){
        
       $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'qualification' => 'required',
                    'designation' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email',
                    'experience' => 'required',
                    'skill' => 'required',
                    'facebook_url' => 'required',
                    'about' => 'required',
                    'services' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        if($request->has('photo')) {
            $file = $request->file('photo');
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
            $logoUrl = 'mentors/' . md5($currentUser->id . time()) . '.' . $extension;
            $storage->put($logoUrl, file_get_contents($file->getRealPath()));
        }
        
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();

        $mentor = Mentor::where('id',$request->input('id'))->first();
        $mentor->first_name = $request->input('first_name');
        $mentor->last_name = $request->input('last_name');
        $mentor->qualification = $request->input('qualification');
        $mentor->designation = $request->input('designation');
        $mentor->phone = $request->input('phone');
        $mentor->email = $request->input('email');
        $mentor->experience = $request->input('experience');
        if($request->has('photo')) {
            $mentor->photo_url = $logoUrl;
        }
        $mentor->facebook_url = $request->input('facebook_url');
        $mentor->about = $request->input('about');
        $mentor->organisation_id = $organisation->id; 
        $mentor->save();
        
        foreach ($request->input('skill') as $value){
            $mentorMembership = new MentorMembership();
            $mentorMembership->mentor_id = $mentor->id;
            $mentorMembership->membership_id = $value;
            $mentorMembership->save();
        }
        
        foreach ($request->input('services') as $value){
            $mentorService = new MentorService();
            $mentorService->mentor_id = $mentor->id;
            $mentorService->service_id = $value;
            $mentorService->save();
        }

        $others = $request->input('others');
        if(!empty($others)) {
            $othersList = [];
            foreach($others as $value) {
                if(empty($value)) {
                    continue;
                }

                $othersList[] = ['ref_id' => $organisation->id, 'type' => 'mentors' , 'value' => $value];
            }
            Other::where('ref_id', $organisation->id)->where('type', 'mentors')->delete();
            Other::insert($othersList);
        }
        return redirect('/mentor')->with(alert('success','Mentor updated successfully'));
    }
    
    public function deleteMentor($id){
        $delete = Mentor::deleteMentor($id);
        if(!$delete){
            return redirect('/mentor')->with(alert('error','Something went wrong'));
        }
        return redirect('/mentor')->with(alert('success','Mentor deleted successfully'));
    }
}
