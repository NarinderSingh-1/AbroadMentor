<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorMembership extends Model
{
    public $timestamps = false;
    
    public Static function deleteMentorSkils($mentorId){
        try {
            return self::where('mentor_id', $mentorId)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
    
}
