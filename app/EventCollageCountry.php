<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCollageCountry extends Model
{
    protected $table = 'event_collages_countries';
    
    public static function deleteRecord($id){
        try {
            return self::where('event_id', $id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
