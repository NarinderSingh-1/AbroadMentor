<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tieup;
use App\Organisation;
use App\Country;

class ArticleController extends Controller
{
    
    private $data = ['tabType' => 'article', 'tabTitle' => 'Articles'];
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

        return view('backend.service.list', $this->data);
    }

    public function edit(Request $request) {
        $this->data['editAction'] = true;

        return view('backend.service.list', $this->data);
    }

    public function save(Request $request)
    {
        
    }
}
