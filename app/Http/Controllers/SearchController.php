<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Organisation;
use App\OrganisationService;
use App\UserMeta;
use App\Tieup;
use App\Event;

class SearchController extends Controller
{
    private $data = [];
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
    public function search(Request $request)
    {
        $place = $request->input('place');
        $service = $request->input('service');
        if($place == "" || $service == "") {
            return redirect('/');
        }

        $organisations = Organisation::search($place, $service);

        return view('frontend.search.search', ['organisations' => $organisations, 'place' => $place, 'service' => $service]);
    }

    /**
     * Search listing using Ajax
     */
    public function listData(Request $request) {
        $id = $request->input('id');
        if (!$id) {
            return response()->json(['res' => false]);
        }

        $organisation = Organisation::find($id);
        if (!$organisation) {
            return response()->json(['res' => false]);
        }

        $gallery = $organisation->gallery()->select('media_url')->where('media_type', 'image')->get();
        $mentors = $organisation->mentors()->count();
        $branch = $organisation->branch()->count();
        $services = OrganisationService::getServiceNames($id);
        $user = UserMeta::getByUserId($id);

        $jsonData = [
            'mentors' => $mentors,
            'branch' => $branch,
            'gallery' => $gallery,
            'services' => $services,
            'user' => $user
        ];

        return response()->json(['res' => true, 'data' => $jsonData]);
    }

    /**
     * Profile detail
     * @param Request $request
     * @param string $city
     * @param string $slug
     */
    public function profileDetail(Request $request, $city, $slug)
    {
        $org = Organisation::getByLocationAndSlug($city, $slug);
        return view('frontend.search.profile', ['org' => $org]);
    }

    /**
     * Get Profile data in background
     */
    public function profileData(Request $request) {
        $action = $request->input('action');
        if (!method_exists($this, $action)) {
            $this->data = ['res' => false, 'msg' => 'Invalid action'];
        }

        $this->{$action}($request->input('id'));

        return response()->json($this->data);
    }

    /**
     * Overview tab
     */
    private function overview($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $gallery = $organisation->gallery()->select('media_url')->where('media_type', 'image')->get();
        $branch = $organisation->branch()->select('landmark')->get();
        $events = $organisation->events()->select('name')->get();
        $services = OrganisationService::getServiceNames($id);
        $user = UserMeta::getByUserId($id);
        
        $jsonData = [
            'branch' => $branch,
            'gallery' => $gallery,
            'services' => $services,
            'events' => $events,
            'user' => $user
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    /**
     * Mentor tab
     */
    private function mentor($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $jsonData = [
            'mentors' => $organisation->mentors
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    /**
     * services tab
     */
    private function service($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $services = OrganisationService::getServiceNames($id);
        $tieups = Tieup::findById($id);

        $jsonData = [
            'services' => $services,
            'tieups' => $tieups
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    private function achievement($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $jsonData = [
            'achievement' => $organisation->achievement
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    /**
     * membership tab
     */
    private function membership($id) {
        $this->data = ['res' => true, 'data' => 'membership'];
    }

    /**
     * events tab
     */
    private function events($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $jsonData = [
            'events' => $organisation->events
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    /**
     * testimonials tab
     */
    private function testimonials($id) {
        $organisation = Organisation::find($id);
        if (!$organisation) {
            $this->data = ['res' => false];
            return;
        }

        $jsonData = [
            'testimonial' => $organisation->testimonial
        ];

        $this->data = ['res' => true, 'data' => $jsonData];
    }

    /**
     * articles tab
     */
    private function article($id) {
        $this->data = ['res' => true, 'data' => 'article'];
    }
}