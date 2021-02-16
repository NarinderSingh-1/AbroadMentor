<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    public static function getServices($organisationId, $type = 'services') {
        return self::select('value')->where('ref_id', $organisationId)->where('type', $type)->get()->toArray();
    }
}
