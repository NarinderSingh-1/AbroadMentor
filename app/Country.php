<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public static function getByIds(array $countryIds) {
        return self::select(['id','country_name'])->whereIn('id', $countryIds)->get()->keyBy('id')->toArray();
    }
}
