<?php

namespace App\Http\Controllers\Landing;

use App\Models\Setting;
use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::whereId(1)->firstOrFail('about');

        UserLog::create([
            'user_id'       => \Auth::user() != NULL ? \Auth::user()->id : NULL,
            'description'   => 'telah mengakses halaman landing page (about)',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return view('landing.about.index', [
            'heroTitle' => 'Tentang',
            'about'     => $setting->about,
        ]);
    }
}
