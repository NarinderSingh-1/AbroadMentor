<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;
use App\Achievement;
use App\Organisation;
use App\MembershipMapping;

class MembershipController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getMembership(){
        if(!currentUser()->organisation){
            return redirect('/profile')->with(alert('success','Complete your profile first'));
        } 
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        $membership = Membership::getMembershipList();
        $membershipDetail = MembershipMapping::getListByOrganisation($organisation->id);
        
        return view('backend.membership.index',['membership'=>$membership,'membershipDetail'=>$membershipDetail]);
    }
    
    public function addMembershipForm(){
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        $membership = Membership::getMembershipList();
        $membershipDetail = MembershipMapping::getListByOrganisation($organisation->id);
        return view('backend.membership.add',['membership'=>$membership,'membershipDetail'=>$membershipDetail]);
    }
    
    public function setMembership(Request $request){
        
        
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        
        $delete = MembershipMapping::deleteRecord($organisation->id);
        foreach ($request->input('membership') as $key => $value) {
            if(isset($value)){
               $membership = new MembershipMapping();
               $membership->membership_id = $key;
               $membership->organisation_id = $organisation->id;
               $membership->membership_value = $value;
               $membership->save();
            }
        }
        
  
        return redirect('/membership')->with(alert('success','Membership added successfully'));
        
    }
}
