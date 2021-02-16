<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationService extends Model
{
    public $timestamps = false;
    
    public static function getServices($organisationId) {
        return self::select('service_id', 'type', 'name')
            ->join('services', 'services.id', '=', 'service_id')
            ->where('organisation_id', $organisationId)->get()->toArray();
    }

    public static function getServiceNames($id) {
        $services = self::getServices($id);
        if(!$services){
            return null;
        }

        $data = [];
        foreach($services as $service) {
            $data[$service['type']][] = $service['name'];
        }

        return $data;
    }

    public static function deleteRecord($id){
        try {
            return self::where('organisation_id',$id)->delete();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }

        return false;
    }
}
