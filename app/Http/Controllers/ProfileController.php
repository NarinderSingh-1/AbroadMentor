<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use App\Day;
use App\Organisation;
use App\Country;
use App\User;
use App\UserMeta;
use App\OrganisationService;
use App\City;
use App\Businesse;
use App\OfficeType;
use App\Branch;
use App\Gallery;

class ProfileController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $currentUser = currentUser();
        if ($currentUser->is_member == 1) {
            return redirect('/customer');
        }

        if (!$currentUser->name) {
            return $this->create($currentUser);
        }

        return view('backend.profile.profile', ['user' => $currentUser]);
    }

    public function create($currentUser) {
        $currentUser = currentUser();
        $serviceList = Service::fetchServiceList();
        return view('backend.profile.profile', ['serviceList' => $serviceList, 'user' => $currentUser]);
    }

    public function postInstitute(Request $request) {
       
        $validator = Validator::make($request->all(), [
                    'name' => 'required|',
                    'email' => 'required',
                    'blog' => 'required',
                    'year' => 'required',
                    'town' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'phone' => 'required',
                    'mobile' => 'required',
                    'alternative_mobile' => 'required',
                    'regestration' => 'required',
                    'zip_code' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }

        try {
            $organisation = Organisation::where('user_id', currentUser()->id)->first();

            if (!$organisation) {
                $organisation = new Organisation();
            }
            $organisation->name = $request->input('name');
            $organisation->started_year = $request->input('year');
            $organisation->primary_website = $request->input('blog');
            $organisation->zipcode = $request->input('zip_code');
            $organisation->city_id = $request->input('city');
            $organisation->state = $request->input('state');
            $organisation->town = $request->input('town');
            $organisation->registration_number = $request->input('regestration');
            $organisation->address = $request->input('address');
            $organisation->office_type_id = $request->input('office_type');
            $organisation->user_id = currentUser()->id;
            $organisation->save();

            $userMeta = UserMeta::where('user_id', currentUser()->id)->first();

            if (!$userMeta) {
                $userMeta = new UserMeta();
            }

            $userMeta->alternative_email = $request->input('email');
            $userMeta->alternative_mobile = $request->input('alternative_mobile');
            $userMeta->mobile = $request->input('mobile');
            $userMeta->phone = $request->input('phone');
            $userMeta->user_id = currentUser()->id;
            $userMeta->save();
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return redirect()->back()->with(alert('success', 'Organisation added successfully'));
    }

    public function getInstitute() {
        $currentUser = currentUser();
        $officeType = OfficeType::pluck('name', 'id');
        $cities = City::pluck('name','id');
        return view('backend.profile.institute', [
            'organisation' => $currentUser->organisation,
            'userMeta' => $currentUser->meta,
            'officeType' => $officeType,
            'cities' =>$cities
        ]);
    }

    public function getAbout() {
        if (currentUser()->organisation) {
            $currentUser = currentUser();
            return view('backend.profile.about', ['user' => $currentUser]);
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function postAbout(Request $request) {
        $validator = Validator::make($request->all(), [
                    'about_us' => 'required|min:3|max:1500|regex:/^[A-Za-z0-9 \-]{3,50}$/',
                    'mission' => 'required|min:3|max:1500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }

        try {

            $organisation = Organisation::where('user_id', currentUser()->id)->first();
            $organisation->about_us = $request->input('about_us');
            $organisation->value_statement = $request->input('mission');
            $organisation->save();
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
            dd($e->getMessage());
        }

        return redirect()->back()->with(alert('success', 'Description added successfully'));
    }

    public function getBranch() {
        if (currentUser()->organisation) {
            $branches = Branch::getList();
            return view('backend.profile.branch', ['branches' => $branches]);
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function getBranchNew() {
        $country = Country::pluck('country_name', 'id')->toArray();
        $days = Day::pluck('day', 'id')->toArray();
        return view('backend.profile.branch-form', ['countries' => $country,'days' => $days]);
    }

    public function setBranchNew(Request $request) {
        $validator = Validator::make($request->all(), [
                    'address' => 'required|',
                    'email' => 'required',
                    'country' => 'required',
                    'pin' => 'required',
                    'phone' => 'required',
                    'from_day'=>'required',
                    'to_day' => 'required',
                    'from_time' => 'required',
                    'to_time'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }
        $branch = new Branch();
        $organisation = Organisation::where('user_id', currentUser()->id)->first();
        $branch->address = $request->input('address');
        $branch->email = $request->input('email');
        $branch->phone = $request->input('phone');
        $branch->pincode = $request->input('pin');
        $branch->country = $request->input('country');
        $branch->organisation_id = $organisation->id;
        $branch->from_day = $request->input('from_day');
        $branch->to_day = $request->input('to_day');
        $branch->from_time = $request->input('from_time');
        $branch->to_time = $request->input('to_time');

        if ($request->has('landmark')) {
            $branch->landmark = $request->input('landmark');
        }
        $branch->save();

        return redirect('/profile/branch')->with(alert('success', 'Branch added successfully'));
    }

    public function editBranch($id) {
        $country = Country::pluck('country_name', 'id')->toArray();
        $brach = Branch::getBranch($id);
        $days = Day::pluck('day', 'id')->toArray();
        return view('backend.profile.branch-form-edit', ['countries' => $country, 'branch' => $brach, 'days' =>$days]);
    }

    public function updateBranch(Request $request) {
        $validator = Validator::make($request->all(), [
                    'address' => 'required|',
                    'email' => 'required',
                    'country' => 'required',
                    'pin' => 'required',
                    'phone' => 'required',
                    'from_day'=>'required',
                    'to_day' => 'required',
                    'from_time' => 'required',
                    'to_time'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(alert('error', implode("<br>", $validator->errors()->all())));
        }
        $branch = Branch::where('id', $request->input('id'))->first();
        $organisation = Organisation::where('user_id', currentUser()->id)->first();
        $branch->address = $request->input('address');
        $branch->email = $request->input('email');
        $branch->phone = $request->input('phone');
        $branch->pincode = $request->input('pin');
        $branch->country = $request->input('country');
        $branch->from_day = $request->input('from_day');
        $branch->to_day = $request->input('to_day');
        $branch->from_time = $request->input('from_time');
        $branch->to_time = $request->input('to_time');
        $branch->organisation_id = $organisation->id;

        if ($request->has('landmark')) {
            $branch->landmark = $request->input('landmark');
        }
        $branch->save();

        return redirect('/profile/branch')->with(alert('success', 'Branch updated successfully'));
    }

    public function getLogo() {
        if (currentUser()->organisation) {
            return view('backend.profile.logo');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function postLogo(Request $request) {
        try {
            $organisation = Organisation::user($currentUser->id);
            if (!$organisation) {
                $organisation = new Organisation();
                $organisation->user_id = $currentUser->id;
            }

            $organisation->logo_url = $this->uploadPic($request->file('logo'));
            ;
            $organisation->save();

            return redirect('/profile')->with(alert('success', 'Logo uploaded successfully'));
        } catch (\Exception $e) {
            return redirect('/profile/logo')->with(alert('error', 'Please check file type and size of document.'));
        }
    }

    public function getSocial() {
        if (currentUser()->organisation) {
            return view('backend.profile.social', ['meta' => currentUser()->meta]);
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function setSocial(Request $request) {

        try {

            $userMeta = UserMeta::where('user_id', currentUser()->id)->first();
            $userMeta->skype_id = $request->input('skype_id');
            $userMeta->facebook_id = $request->input('facebook_id');
            $userMeta->insta = $request->input('insta');
            $userMeta->twitter = $request->input('twitter');
            $userMeta->youtube = $request->input('youtube');
            $userMeta->google_id = $request->input('google_id');
            $userMeta->save();
        } catch (\Exception $e) {
            \Log::info(__METHOD__ . ':' . $e->getMessage());
        }

        return redirect()->back()->with(alert('success', 'Social added successfully'));
    }

    public function getGallery() {
        if (currentUser()->organisation) {
            return view('backend.gallery.gallery');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function getIntroVideo() {
        if (currentUser()->organisation) {
            return view('backend.gallery.intro');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function setIntroVideo(Request $request) {

        $organisation = Organisation::where('user_id', currentUser()->id)->first();

        $gallery = new Gallery();
        $gallery->media_url = $this->uploadPic($request->file('intro'));
        $gallery->media_type = "intro";
        $gallery->organisation_id = $organisation->id;
        $gallery->save();

        return redirect('/profile/gallery')->with(alert('success', 'introvideo uploaded successfully'));
    }

    public function getImage() {
        if (currentUser()->organisation) {
            return view('backend.gallery.image');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function setImage(Request $request) {
        $organisation = Organisation::where('user_id', currentUser()->id)->first();
        $image = $request->input('image');

        for ($i = 0; $i < count($image); $i++) {
            $gallery = new Gallery();
            $gallery->media_url = $this->uploadPic($image[$i]);
            $gallery->media_type = "image";
            $gallery->organisation_id = $organisation->id;
            $gallery->save();
        }

        return redirect('/profile/gallery')->with(alert('success', 'Image uploaded successfully'));
    }

    public function getVideo() {
        if (currentUser()->organisation) {
            return view('backend.gallery.video');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function setVideo(Request $request) {
        $organisation = Organisation::where('user_id', currentUser()->id)->first();

        $gallery = new Gallery();
        $gallery->media_url = $this->uploadPic($request->file('video'));
        $gallery->media_type = "video";
        $gallery->organisation_id = $organisation->id;
        $gallery->save();

        return redirect('/profile/gallery')->with(alert('success', 'Video uploaded successfully'));
    }

    public function getDocument() {
        if (currentUser()->organisation) {
            return view('backend.gallery.document');
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function setDocument(Request $request) {
        $organisation = Organisation::where('user_id', currentUser()->id)->first();

        $gallery = new Gallery();
        $gallery->media_url = $this->uploadPic($request->file('document'));
        $gallery->media_type = "document";
        $gallery->organisation_id = $organisation->id;
        $gallery->save();

        return redirect('/profile/gallery')->with(alert('success', 'document uploaded successfully'));
    }

    public function saveProfileUrl(Request $request) {
        if (currentUser()->organisation) {
            $org = Organisation::find($request->input('org'));
            if (!$org) {
                return response()->json(['res' => false]);
            }

            $org->url = $request->input('url');
            $org->save();

            return response()->json(['res' => true]);
        } else {
            return redirect()->back()->with(alert('error', 'first add Organisation'));
        }
    }

    public function uploadPic($file) {
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getClientMimeType();

        $allowedFiles = [
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp'
        ];

        // Check fileType Mime and extension
        if (!in_array($mimeType, array_values($allowedFiles)) || !array_key_exists($extension, $allowedFiles)) {
            return redirect()->back()->with(alert('error', 'Invalid file type. Please upload correct one.'));
        }

        $fileSize = $file->getClientSize();
        if ($fileSize > 5242880) { // Limit of 5 MB size
            return redirect()->back()->with(alert('error', 'File size should be less or equal to 5MB only'));
        }

        $currentUser = currentUser();
        $storage = \Storage::disk('local');
        $logoUrl = 'logos/' . md5($currentUser->id . time()) . '.' . $extension;
        $storage->put($logoUrl, file_get_contents($file->getRealPath()));

        return $logoUrl;
    }

}
