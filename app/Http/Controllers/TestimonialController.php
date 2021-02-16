<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Validator;
use App\Organisation;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
       $testimonial = Testimonial::getTestimonialList();
       return view('backend.video-testimonial.index',['testimonial'=>$testimonial]);
       
   }

    public function getTestimonial()
    {
        return view('backend.video-testimonial.add');
    }

    public function setTestimonial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'city' => 'required',
            'name' => 'required',
            'video_url' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }
       
        $organisation = Organisation::select("id")->where('user_id', currentUser()->id)->first();
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->input('video_url'), $match);
        $youtube_id = $match[1];
        $testimonial             = new Testimonial();
        $testimonial->name       = $request->input('name');
        $testimonial->video_url  = $youtube_id;
        $testimonial->city       = $request->input('city');
        $testimonial->title      = $request->input('title');
        $testimonial->organisation_id = $organisation->id;
        $testimonial->save();

        return redirect('/video-testimonials')->with(alert('success', 'Testimonial added successfully'));
    }

    
    
    public function editTestimonial($id)
    {
        $testimonialDetail = Testimonial::getTestimonialById($id);
        return view('backend.video-testimonial.edit', ['testimonialDetail'=> $testimonialDetail]);
    }
    
    public function updateTestimonial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'city' => 'required',
            'name' => 'required',
            'video_url' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }

        $organisation = Organisation::select("id")->where('user_id', currentUser()->id)->first();

        $testimonial                  = Testimonial::where('id',$request->input('id'))->first();
        $testimonial->name            = $request->input('name');
        $testimonial->title           = $request->input('title');
        $testimonial->video_url       = $request->input('video_url');
        $testimonial->city            = $request->input('city');
        $testimonial->organisation_id = $organisation->id;
        $testimonial->save();

        return redirect('/video-testimonials')->with(alert('success', 'Testimonial updated successfully'));
    }
    
    public function deleteTestimonial($id){
        $delete = Testimonial::deleteTestimonial($id);
        if(!$delete){
            return redirect('/video-testimonials')->with(alert('error','Something went wrong'));
        }
        return redirect('/video-testimonials')->with(alert('success','Testimonial deleted successfully'));
    }
}
