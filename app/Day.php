<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = "days_master";
    
    public static function fetchDaysList() {
        try {
            return self::pluck('day', 'id');
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
        
        return false;
    }
}
