<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Organisation;
use App\Exam;
use Validator;

class ScoreController extends Controller {
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
        
        $scores = Score::getScoreList();
        return view('backend.our_scores.index',['scores'=>$scores]);
    }
    
    public function getScore(){
        
        $exam = Exam::pluck('name', 'id')->toArray();
        return view('backend.our_scores.add',['exams'=>$exam]);
    }
    
    public function setScore(Request $request){
         $rules =[
                    'title' => 'required',
                    'name' => 'required',
                    'city' => 'required',
                    'profile' => 'required',
                    'score_image' => 'required',
                    'score' => 'required'
                    
        ];
       
        $exam = Exam::where('id',$request->input('exam'))->first();
        if($exam['name'] =='IELSE' || $exam['name'] =='PTE'){
            $rules['reading'] ='required';
            $rules['writing'] ='required';
            $rules['listening'] ='required';
            $rules['speaking'] ='required';
        } 
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        $profileImage = (new VisaController)->uploadPic($request->file('profile'));
        $scoreImage = (new VisaController)->uploadPic($request->file('score_image'));
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        
        $score = new Score();
        $score->student_name = $request->input('name');
        $score->title = $request->input('title');
        $score->city = $request->input('city');
        $score->exam_id = $request->input('exam');
         if($exam['name'] =='IELSE' || $exam['name'] =='PTE'){
            $score->reading = $request->input('reading');
            $score->writing = $request->input('writing');
            $score->listening = $request->input('listening');
            $score->speaking = $request->input('speaking');
        }
        
        $score->overall = $request->input('score');
        $score->image_url = $profileImage;
        $score->score_card_url = $scoreImage;
        $score->organisation_id = $organisation->id; 
        $score->save();
         
        
        return redirect('/score')->with(alert('success','Score added successfully'));
        
    }
    
    public function editScore($id){
        $scoreDetail = Score::getScoreById($id);
        $exam = Exam::pluck('name', 'id')->toArray();
        return view('backend.our_scores.edit',['exams'=>$exam,'score'=>$scoreDetail]);
    }
    
     public function updateScore(Request $request){
        
        $rules =[
                    'title' => 'required',
                    'name' => 'required',
                    'city' => 'required',
                    'score' => 'required'
                    
        ];
        $exam = Exam::where('id',$request->input('exam'))->first();
        if($exam['name'] =='IELSE' || $exam['name'] =='PTE'){
            $rules['reading'] ='required';
            $rules['writing'] ='required';
            $rules['listening'] ='required';
            $rules['speaking'] ='required';
        } 
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(alert('error',
                        implode("<br>", $validator->errors()->all())));
        }
        
        if($request->has('photo')) {
        $profileImage = (new VisaController)->uploadPic($request->file('profile'));
        }
        if($request->has('score_image')) {
        $scoreImage = (new VisaController)->uploadPic($request->file('score_image'));
        }
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
        $score = Score::where('id',$request->input('id'))->first();
        $score->student_name = $request->input('name');
        if($exam['name'] =='IELSE' || $exam['name'] =='PTE'){
            $score->reading = $request->input('reading');
            $score->writing = $request->input('writing');
            $score->listening = $request->input('listening');
            $score->speaking = $request->input('speaking');
        }
        $score->title = $request->input('title');
        $score->city = $request->input('city');
        $score->exam_id = $request->input('exam');
        $score->overall = $request->input('score');
        if($request->has('photo')) {
            $score->image_url = $profileImage;
        }
        if($request->has('score_image')) {
            $score->score_card_url = $scoreImage;
        }
        $score->organisation_id = $organisation->id; 
        $score->save();
         
        
        return redirect('/score')->with(alert('success','Score updated successfully'));
        
    }
    
    public function deleteScore($id){
        $delete = Score::deleteScore($id);
        if(!$delete){
            return redirect('/score')->with(alert('error','Something went wrong'));
        }
        return redirect('/score')->with(alert('success','Score deleted successfully'));
    }
}
