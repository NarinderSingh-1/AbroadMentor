<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = ["city"];
    
    public static function getVisaList(){
        try {
            return self::select('visas.id','visas.name','visas.address','visas.refuse_count','visas.city','visas.title','visas.university','visas.photo_media_url','visas.visa_media_url','countries.country_name','exams.name as exam_name')
                            ->join('countries', 'countries.id', '=', 'visas.country_id')
                            ->join('exams', 'exams.id', '=', 'visas.exam_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function getVisaById($id){
        try {
            return self::select('visas.exam_id','visas.country_id','visas.id','visas.name','visas.address','visas.refuse_count','visas.city','visas.title','visas.university','visas.photo_media_url','visas.visa_media_url','countries.country_name','exams.name as exam_name')
                            ->join('countries', 'countries.id', '=', 'visas.country_id')
                            ->join('exams', 'exams.id', '=', 'visas.exam_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->where('visas.id',$id)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteVisa($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
