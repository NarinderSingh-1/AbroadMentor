<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
   public static function getTestimonialList(){
        try {
            return self::select('*')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function getTestimonialById($id){
        try {
           return self::select('*')
                            ->where('id',$id)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteTestimonial($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    } 
}
