<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class City extends Model
{
    public static function getList()
    {
        return Cache::rememberForever('cities', function(){
            return self::pluck('name')->toArray();
        });
    }
}
