<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    public static function getMetaDetailById($userId) {
        try {
            return self::select('alternative_email', 'mobile', 'phone', 'skype_id', 'facebook_id', 'google_id','linked_id')
                            ->where('user_id', $userId)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }

        return false;
    }

    public static function getByUserId($userId) {
        try {
            return self::select('skype_id', 'facebook_id', 'google_id','linked_id')
                            ->where('user_id', $userId)
                            ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }

        return false;
    }
}
