<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tieup;
use App\Organisation;
use App\Country;
use App\Other;

class TieupsController extends Controller
{

    private $data = ['tabType' => 'tieups', 'tabTitle' => 'Tieups'];
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getTieups(){
        $country = Country::pluck('country_name','id')->toArray();
        return view('backend.tie_ups.index',['countries' => $country]);
    }
    
    public function setTieups(Request $request){
        $organisation = Organisation::select("id")->where('user_id',currentUser()->id)->first();
         
        foreach ($request->input('common') as $value) {
             
            $tieups = new Tieup();
            $tieups->country_id = $value['country'];
            $tieups->university =  $value['university'];
            $tieups->organisation_id =  $organisation->id;
            $membership->save();
        }
        return redirect()->back()->with(alert('success','Tieups added successfully'));
    }

    public function get(Request $request) {
        $this->data['editAction'] = false;
        
        $this->prepareTieupsData();

        return view('backend.service.list', $this->data);
    }

    public function edit(Request $request) {
        $this->data['editAction'] = true;

        $this->prepareTieupsData();
        
        return view('backend.service.list', $this->data);
    }

    public function save(Request $request)
    {
        $countries = $request->input('countries');
        $others = $request->input('others');
        $organisationId = currentUser()->organisation->id;

        Tieup::where('organisation_id', $organisationId)->delete(); // First delete

        if(!empty($countries)) { // Insert countries tieups only
            $countryList = [];
            foreach($countries as $countryId) {
                $countryList[] = ['country_id' => $countryId, 'organisation_id' => $organisationId];
            }

            Tieup::insert($countryList);
        }

        if(!empty($others['degree']) && !empty($others['degree']['college'])) { // Insert tieups with countries, universities, qualification
            $countryList = [];
            for($i = 0; $i < count($others['degree']['college']); $i++) {
                if( !isset($others['degree']['college'][$i]) || !isset($others['degree']['country'][$i]) ) {
                    continue;
                }

                $countryList[] = [
                    'organisation_id' => $organisationId,
                    'country_id' => $others['degree']['country'][$i],
                    'university' => $others['degree']['college'][$i]
                ];
            }

            Tieup::insert($countryList);
        }

        if(!empty($others['countries'])) { // Insert other countries
            $othersList = [];
            foreach($others['countries'] as $value) {
                if(empty($value)) {
                    continue;
                }

                $othersList[] = ['ref_id' => $organisationId, 'type' => 'tieups' , 'value' => $value];
            }

            Other::where('ref_id', $organisationId)->where('type', 'tieups')->delete();
            Other::insert($othersList);
        }

        return redirect('tieups')->with(alert('success','Service added successfully'));
    }

    private function prepareTieupsData() {
        $organisationId = currentUser()->organisation->id;
        $tieupsList = Tieup::getByOrganisationId($organisationId);
        $this->data['tieupsOther'] = Other::getServices($organisationId, 'tieups');
        $this->data['countries'] = Country::all(['id', 'country_name'])->toArray();
        $this->data['tieupsCountries'] = Country::getByIds($tieupsList->pluck('country_id')->toArray());

        $this->data['tieups'] = $tieupsList->toArray();

        $this->data['tieupsCountry'] = [];
        $this->data['tieupsCollege'] = [];
        foreach($tieupsList as $tieup) { // Put tieups country id
            if(!empty($tieup['university'])) {
                $this->data['tieupsCollege'][] = $tieup;
                continue;
            }

            $this->data['tieupsCountry'][] = $tieup['country_id'];
        }
    }
}
