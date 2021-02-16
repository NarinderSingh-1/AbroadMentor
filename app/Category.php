<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{
    public static function getList()
    {
        return Cache::rememberForever('categories',
                function() {
                return self::pluck('name')->toArray();
            });
    }
}
