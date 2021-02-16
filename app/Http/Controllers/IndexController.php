<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Service;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityList = City::getList();
        $serviceList = Service::getList();

        $cities = [];
        foreach($cityList as $cityName) {
            $cities[ucfirst($cityName)] = null;
        }

        $services = [];
        foreach($serviceList as $serviceName) {
            $services[$serviceName] = null;
        }
        
        return view('frontend.index', [
            'cities' => json_encode($cities),
            'services' => json_encode($services)
        ]);
    }
}
