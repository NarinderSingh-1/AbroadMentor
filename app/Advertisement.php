<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public static function getAdvertisementList(){
        try {
            return self::select('*')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteAdvertisement($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
