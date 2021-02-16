<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Country;
use Validator;
use App\EventCollageCountry;

class EventController extends Controller
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
        if(currentUser()->organisation){
            $event = Event::getEventList();
            return view('backend.events.index',['events'=>$event]);
        } else {
            return view('backend.events.index');
        }
    }
    
    public function getEvent(){
        
        $countries = Country::pluck('country_name', 'id')->toArray();
        return view('backend.events.add',['countries'=> $countries ] );
    }
    
    public function setEvent(Request $request){
       if(currentUser()->organisation){
        $rules =[
            'name' => 'required',
            'category' => 'required',
            'introduction' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required',
            'hotel' => 'required',
        ];
        $others = $request->input('others');
       
        $organisationId = currentUser()->organisation->id;
        
        if(empty($others['degree']['country']) || empty($others['degree']['collage'])) { // Insert tieups with countries, universities, qualification
            $rules['collage'] ='required';
            $rules['country'] ='required';
        } 
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        $event = new Event();
        $event->name = $request->input('name');
        $event->category = $request->input('category');
        $event->introduction = $request->input('introduction');
        $event->date = $request->input('date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->city = $request->input('city');
        $event->hotel = $request->input('hotel');
        $event->organisation_id = $organisationId; 
        $event->save();
        
      
        $countryList = [];
        for($i = 0; $i < count($others['degree']['collage']); $i++) {
            if(!isset($others['degree']['collage'][$i]) || !isset($others['degree']['country'][$i]) || !isset($others['degree']['description'][$i])) {
                continue;
            }

            $countryList[] = [
                'event_id' => $event->id,
                'country_id' => $others['degree']['country'][$i],
                'collage' => $others['degree']['collage'][$i],
                'description' => $others['degree']['description'][$i],
                
            ];
            EventCollageCountry::insert($countryList);
        }
        
        return redirect('/event')->with(alert('success','Event added successfully'));
        
    } else {
        return redirect('/event')->with(alert('error','No organisation is found please add first'));
    }
 }  
    public function editEvent($id){
        $eventDetail = Event::getEventById($id);
        $collageList = EventCollageCountry::select('country_id', 'collage','description')->where('event_id',$id)->get();
        $countries = Country::pluck('country_name', 'id')->toArray();
        return view('backend.events.edit',['countries'=>$countries,'event'=>$eventDetail,'collageList' => $collageList]);
    }
    
     public function updateEvent(Request $request){
       
       $rules =[
            'name' => 'required',
            'category' => 'required',
            'introduction' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required',
            'hotel' => 'required',
        ];
        $others = $request->input('others');
       
        $organisationId = currentUser()->organisation->id;
        
        if(empty($others['degree']['country']) || empty($others['degree']['collage'])) { // Insert tieups with countries, universities, qualification
            $rules['collage'] ='required';
            $rules['country'] ='required';
        } 
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        $event = Event::where('id',$request->input('id'))->first();;
        $event->name = $request->input('name');
        $event->category = $request->input('category');
        $event->introduction = $request->input('introduction');
        $event->date = $request->input('date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->city = $request->input('city');
        $event->hotel = $request->input('hotel');
        $event->organisation_id = $organisationId; 
        $event->save();
        
      
        $countryList = [];
        $delete = EventCollageCountry::deleteRecord($request->input('id'));
        for($i = 0; $i < count($others['degree']['collage']); $i++) {
            if(!isset($others['degree']['collage'][$i]) || !isset($others['degree']['country'][$i]) || !isset($others['degree']['description'][$i])) {
                continue;
            }

            $countryList[] = [
                'event_id' => $event->id,
                'country_id' => $others['degree']['country'][$i],
                'collage' => $others['degree']['collage'][$i],
                'description' => $others['degree']['description'][$i],
                
            ];
            EventCollageCountry::insert($countryList);
            unset($countryList);
        }
        return redirect('/event')->with(alert('success','Event updated successfully'));
        
    }
    
    public function deleteEvent($id){
        $delete = Event::deleteEvent($id);
        if(!$delete){
            return redirect('/event')->with(alert('error','Something went wrong'));
        }
        return redirect('/event')->with(alert('success','Event deleted successfully'));
    }
    
}
