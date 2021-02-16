<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public $timestamps = false;
    
    public static function getMembershipList(){
        try {
            return self::select('*')
                            ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
