<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller {

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
        if($currentUser->is_member == 0) {
            return redirect('/agency');
        }
        
        return 'dfds';
    }

}
