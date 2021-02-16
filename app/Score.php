<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public static function getScoreList(){
        try {
            return self::select('scores.*','exams.name as exam_name')
                            ->join('exams', 'exams.id', '=', 'scores.exam_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function getScoreById($id){
        try {
           return self::select('scores.*','exams.name as exam_name')
                            ->join('exams', 'exams.id', '=', 'scores.exam_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->where('scores.id',$id)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteScore($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
