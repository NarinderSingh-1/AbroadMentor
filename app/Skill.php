<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];
    
    public static function getList()
    {
        try {
            return self::pluck('name', 'id')
                    ->toArray();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }
    
    public static function getSkillByid($id){
        try {
            return self::select('skills.name')
                        ->join('mentor_skills', 'mentor_skills.skill_id', '=', 'skills.id')
                        ->where('mentor_skills.mentor_id',$id)
                        ->pluck('name')->toArray();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
    }
}
