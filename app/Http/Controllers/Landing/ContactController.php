<?php

namespace App\Http\Controllers\Landing;

use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        UserLog::create([
            'user_id'       => \Auth::user() != NULL ? \Auth::user()->id : NULL,
            'description'   => 'telah mengakses halaman landing page (contact)',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return view('landing.contact.index');
    }

    public function store(Request $request)
    {
        return abort(403);
    }
}
