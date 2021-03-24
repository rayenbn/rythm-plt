<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Startup;
use App\Models\Scholarship;
use App\Models\University;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(\Config::get('constants.industries'));
        $startups = Startup::all();
        $scholarships = Scholarship::all();
        $universities = University::all();
        return view('frontend.home',compact('startups', 'scholarships','universities'));
    }
}
