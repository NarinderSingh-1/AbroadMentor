<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Organisation extends Model
{

    public function city() {
        return $this->belongsTo('App\City');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function business() {
        return $this->belongsTo('App\Businesse');
    }

    public function services() {
        return $this->belongsTo('App\OrganisationService');
    }

    public function gallery() {
        return $this->hasMany('App\Gallery');
    }

    public function mentors() {
        return $this->hasMany('App\Mentor');
    }

    public function branch() {
        return $this->hasMany('App\Branch');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }

    public function testimonial() {
        return $this->hasMany('App\Testimonial');
    }

    public function achievement() {
        return $this->hasMany('App\Achievement');
    }

    public static function getOrganisationDetailById($id)
    {
        try {
            return self::select(
                        'logo_url', 'country_id',
                        DB::raw('cities.name as city, countries.country_name as country, businesses.name as business'),
                        'organisations.name', 'registration_number',
                        'business_id', 'started_year', 'parent_trading_name',
                        'previous_trading_name', 'address', 'town', 'city_id',
                        'zipcode', 'phone', 'primary_website',
                        'secondary_website', 'value_statement', 'about_us',
                        'url')
                    ->join('countries', 'countries.id', '=', 'organisations.country_id')
                    ->join('businesses', 'businesses.id', '=', 'organisations.country_id')
                    ->join('cities', 'cities.id', '=', 'organisations.city_id')
                    ->where('user_id', $id)
                    ->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__.':'.$ex->getMessage());
        }

        return false;
    }

    public static function user($userId, $select = ['*']) {
        try {
            return self::select($select)->where('user_id', $userId)->first();
        } catch (QueryException $ex) {
            Log::info(__METHOD__ . ':' . $ex->getMessage());
        }
        
        return false;
    }
    
    /**
     * Get profile by location and slug
     * @param String $location
     * @param String $slug
     * @return object
     */
    public static function getByLocationAndSlug($location, $slug) {
        return self::select(['organisations.*', 'cities.name as cityName', 'countries.country_name as countryName', 'businesses.name as businessName'])
            ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->leftJoin('countries', 'countries.id', '=', 'organisations.country_id')
            ->leftJoin('businesses', 'businesses.id', '=', 'organisations.country_id')
            ->where('cities.name', strtolower($location))
            ->where('url', $slug)
            ->first();
    }

    /**
     * Search organization by place and service
     * @param string $place
     * @param string $service
     * @return object
     */
    public static function search($place, $service) {
        return self::select('organisations.id','logo_url',
                        DB::raw('cities.name as city'),
                        'organisations.name', 'address', 'town', 'city_id',
                        'zipcode', 'phone', 'primary_website',
                        'secondary_website', 'value_statement', 'about_us',
                        'url', 'started_year')
            ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->leftJoin('organisation_services', 'organisation_id', '=', 'organisations.id')
            ->leftJoin('services', 'organisation_services.service_id', '=', 'services.id')
            ->where('cities.name', 'like', '%' . $place . '%')
            ->where('services.name', 'like', '%' . $service . '%')
            ->limit(5)
            ->get();
    }
}
