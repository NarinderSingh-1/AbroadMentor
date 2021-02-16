<?php

namespace App;
use DB;    

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public static function getList(){
         try {
            return self::select('branches.*', DB::raw('countries.country_name as country'))
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->leftJoin('countries', 'countries.id', '=', 'branches.country')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
     public static function getBranch($id){
         try {
            return self::select('branches.*', DB::raw('countries.country_name as country'),'countries.id as country_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->leftJoin('countries', 'countries.id', '=', 'branches.country')
                            ->where('branches.id',$id)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
