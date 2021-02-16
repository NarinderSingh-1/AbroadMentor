<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipMapping extends Model
{
    public static function deleteRecord($id){
        try {
            return self::where('organisation_id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function getListByOrganisation($id){
        try{
            return self::where('organisation_id', $id)->pluck('membership_value','membership_id')->toArray();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
