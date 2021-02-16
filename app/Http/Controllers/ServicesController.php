<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Other;
use Validator;
use App\Country;
use App\OrganisationService;
use App\Tieup;

class ServicesController extends Controller
{
    private $data = ['tabType' => 'service', 'tabTitle' => 'Services'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function get(Request $request) {
        $this->data['editAction'] = false;
        $this->prepareServiceData();
        return view('backend.service.list', $this->data);
    }
    
    public function edit() {
        $this->data['editAction'] = true;
        $this->prepareServiceData();
        return view('backend.service.list', $this->data);
    }
    
    public function save(Request $request) {
        try {
            $services = $request->input('services');
            $others = $request->input('others');
            
            $organisationId = currentUser()->organisation->id;

            if(!empty($services)) {
                $serviceList = [];
                foreach($services as $serviceType => $serviceValues) {
                    foreach($serviceValues as $serviceId) {
                        $serviceList[] = ['organisation_id' => $organisationId, 'service_id' => $serviceId, 'type' => $serviceType];
                    }
                }

                OrganisationService::where('organisation_id', $organisationId)->delete();
                OrganisationService::insert($serviceList);
            }

            if(!empty($others)) {
                $othersList = [];
                foreach($others as $value) {
                    if(empty($value)) {
                        continue;
                    }
                    
                    $othersList[] = ['ref_id' => $organisationId, 'type' => 'services' , 'value' => $value];
                }

                Other::where('ref_id', $organisationId)->where('type', 'services')->delete();
                Other::insert($othersList);
            }

        } catch (\Illuminate\Database\QueryException $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return redirect('service')->with(alert('success','Service added successfully'));
    }

    private function prepareServiceData() {
        $organisationId = currentUser()->organisation->id;
        $this->data['serviceList'] = Service::fetchServiceList()->toArray();
        $mappedServices = OrganisationService::getServices($organisationId);
        $this->data['mappedOther'] = Other::getServices($organisationId);

        $this->data['mappedService'] = ['major' => [], 'other' => []];
        foreach($mappedServices as $mapService) {
            $this->data['mappedService'][$mapService['type']][] = $mapService['service_id'];
        }
    }
}
