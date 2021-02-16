<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tieup extends Model
{
    public static function getByOrganisationId($organisationId) {
        return self::select('country_id', 'university')
            //->whereNull('university')
            ->where('organisation_id', $organisationId)
            ->get();
    }

    public static function findById($organisationId) {
        return self::select('country_name', 'university')
            ->join('countries', 'country_id', '=', 'countries.id')
            ->where('organisation_id', $organisationId)
            ->get();
    }
}
