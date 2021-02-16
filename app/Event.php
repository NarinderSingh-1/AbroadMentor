<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{
    public static function getEventList(){
        try {
             return self::select('events.*', DB::raw('GROUP_CONCAT(`event_collages_countries`.`collage`) as collage'),
                     DB::raw('GROUP_CONCAT(`countries`.`country_name`) as country'))
                            ->leftJoin('event_collages_countries', 'event_collages_countries.event_id', '=', 'events.id')
                            ->leftJoin('countries', 'countries.id', '=', 'event_collages_countries.country_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->groupBy('events.id')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
     public static function getEventById($id){
        try {
             return self::select('events.*', DB::raw('GROUP_CONCAT(`event_collages_countries`.`collage`) as collage'),
                     DB::raw('GROUP_CONCAT(`countries`.`country_name`) as country'))
                            ->leftJoin('event_collages_countries', 'event_collages_countries.event_id', '=', 'events.id')
                            ->leftJoin('countries', 'countries.id', '=', 'event_collages_countries.country_id')
                            ->where('organisation_id', currentUser()->organisation->id)
                            ->where('events.id',$id)
                            ->groupBy('events.id')
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
    public static function deleteEvent($id){
        try {
            return self::where('id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
