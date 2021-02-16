<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Service extends Model
{

    public static function getList()
    {
        return Cache::rememberForever('services',
                function() {
                return self::pluck('name')->toArray();
            });
    }
    
    public static function getServiceList(){
         try {
            return self::pluck('name','id')->toArray();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }
    }

    public static function fetchServiceList()
    {
        try {
            return self::select('id', 'name')->get()->keyBy('id');
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }

    public static function fetchTrashList()
    {
        try {
            return self::select('id', 'name')
                    ->onlyTrashed()
                    ->get();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }

    public static function getDeletedServiceDetail($id)
    {
        try {
            return self::select('id', 'name')
                    ->onlyTrashed()
                    ->where('id', $id)
                    ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }

    public static function getServiceDetail($id)
    {
        try {
            return self::select('id', 'name')
                    ->where('id', $id)
                    ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }

    public static function getServicecount($id)
    {
        try {
            return self::where('id', '!=', $id)
                    ->count();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }
    }

    public static function restoreService($id)
    {
        try {
            return self::withTrashed()
                    ->where('id', $id)
                    ->restore();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }
    }
}