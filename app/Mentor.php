<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mentor extends Model
{
    public static function getList(){
        try {
            return self::select('logo_url', 'country_id', DB::raw('countries.country_name as country'), 'organisations.name', 'registration_number', 'business_id','started_year', 'parent_trading_name', 'previous_trading_name','address','town','city_id')
                            ->join('mentor_services', 'mentor_services.mentor_id', '=', 'mentors.id')
                            ->join('services', 'services.id', '=', 'mentor_services.service_id')
                            ->join('mentor_memberships', 'mentor_memberships.mentor_id', '=', 'mentors.id')
                            ->join('memberships', 'memberships.id', '=', 'mentor_memberships.membership_id')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }

    }
    
    public static function getMentors(){
         try {
            return self::select('mentors.*', DB::raw('GROUP_CONCAT(`services`.`name`) as services'), DB::raw('CONCAT(`memberships`.`title`) as memberships'))
                            ->leftjoin('mentor_services', 'mentor_services.mentor_id', '=', 'mentors.id')
                            ->leftjoin('services', 'services.id', '=', 'mentor_services.service_id')
                            ->leftjoin('mentor_memberships', 'mentor_memberships.mentor_id', '=', 'mentors.id')
                            ->leftjoin('memberships', 'memberships.id', '=', 'mentor_memberships.membership_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->groupBy('mentors.id')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function getMentorDetail($id){
         try {
            return self::select('mentors.*', DB::raw('GROUP_CONCAT(`services`.`name`) as services'), 
                    DB::raw('CONCAT(`memberships`.`title`) as memberships'))
                    ->leftjoin('mentor_memberships', 'mentor_memberships.mentor_id', '=', 'mentors.id')
                    ->leftjoin('memberships', 'memberships.id', '=', 'mentor_memberships.membership_id')
                    ->leftjoin('mentor_services', 'mentor_services.mentor_id', '=', 'mentors.id')
                    ->leftjoin('services', 'services.id', '=', 'mentor_services.service_id')
                    ->where('mentors.id',$id)
                    ->where('organisation_id', currentUser()->organisation->id)
                    ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteMentor($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
}
