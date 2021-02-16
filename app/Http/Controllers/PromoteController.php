<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Organisation;
use Validator;

class PromoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        return view('backend.promote.index');
    }
    
    public function getAdvertisementList(){
        $advertisement = Advertisement::getAdvertisementList();
        return view('backend.promote.advertise',['advertisements'=>$advertisement]);
    }
    
    public function setAdvertisement(Request $request){
       
        $validator = Validator::make($request->all(), [
                    'company_name' => 'required',
                    'city' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'mob_no' => 'required|numeric',
                    'line_no' => 'required|numeric'
                    
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        $add = new Advertisement();
        $add->company_name = $request->input('company_name');
        $add->city = $request->input('city');
        $add->first_name = $request->input('first_name');
        $add->last_name = $request->input('last_name');
        $add->mobile = $request->input('mob_no');
        $add->phone = $request->input('line_no');
        $add->organisation_id = $organisation->id; 
        $add->save();
         
        
        return redirect()->back()->with(alert('success','Advertisement added successfully'));
        
    }
    
    public function editAdvertisement($id){
        $advertisement = Advertisement::select("*")->where('id',$id)->first();
        return view('backend.promote.advertiseEdit',['advertisement'=>$advertisement]);
    }
    
     public function updateAdvertisement(Request $request){
       $validator = Validator::make($request->all(), [
                    'company_name' => 'required',
                    'city' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'mob_no' => 'required|numeric',
                    'line_no' => 'required|numeric'
                    
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        $add = Advertisement::select("*")->where('id',$request->input('id'))->first();
        $add->company_name = $request->input('company_name');
        $add->city = $request->input('city');
        $add->first_name = $request->input('first_name');
        $add->last_name = $request->input('last_name');
        $add->mobile = $request->input('mob_no');
        $add->phone = $request->input('line_no');
        $add->organisation_id = $organisation->id; 
        $add->save();
         
        return redirect()->back()->with(alert('success','Advertisement updated successfully'));
        
    }
    
    public function getBadge(){
        return view('backend.promote.add');
    }
    
    public function getAdvertisement(){
        return view('backend.promote.advertiseAdd');
    }
    
    public function getPromote(){
        return view('backend.promote.promote');
    }
    
    public function deleteAdvertisement($id){
        $delete = Advertisement::deleteAdvertisement($id);
        if(!$delete){
            return redirect('/mentor')->with(alert('error','Something went wrong'));
        }
        return redirect('/mentor')->with(alert('success','Advertisement deleted successfully'));
    }
}
