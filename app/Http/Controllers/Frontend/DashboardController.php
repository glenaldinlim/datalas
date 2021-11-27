<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Community;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $community = Community::where('user_id', \Auth::user()->id)->firstOrFail();
        $production = Production::where('community_id', $community->id)->count();
        
        return view('frontend.dashboard', [
            'production' => $production,
        ]);
    }
}
