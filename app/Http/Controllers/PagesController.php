<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $pages = [];

    public function __construct() {
       $this->pages = [
           'about',
           'contact',
           'faq',
           'help-desk',
           'find-consultants',
           'find-institutions',
           'privacy-policy',
           'terms-and-condition',
           'refund-policy',
           'how-to-use',
           'global-marketing-gap',
           'marketing-control',
           'reporting-mechanism',
           'achieve-guaranteed-international-targets',
           'application-and-management-ecosystem',
           'global-agent-and-student-network'
       ]; 
    }

    public function index(Request $request, $slug) {
        if(in_array($slug, $this->pages)) {
            return view("frontend.pages.{$slug}");
        }
        
        return redirect('/');
    }
}
 