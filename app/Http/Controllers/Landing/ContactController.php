<?php

namespace App\Http\Controllers\Landing;

use App\Models\Contact;
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
        $validation = \Validator::make($request->all(), [
            'first_name'    => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'last_name'     => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'email'         => 'required|email|unique:users',
            'message'       => 'required'
        ])->validate();

        $contact = Contact::create([
            'first_name'    => ucwords($request->get('first_name')),
            'last_name'     => ucwords($request->get('last_name')),
            'email'         => $request->get('email'),
            'message'       => $request->get('message'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user() != NULL ? \Auth::user()->id : NULL,
            'description'   => 'telah mengirim pesan dari halaman landing page (contact)',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('front.landing.contact.index')->with('success', 'Terimakasih sudah mengirimi pesan!');
    }
}
