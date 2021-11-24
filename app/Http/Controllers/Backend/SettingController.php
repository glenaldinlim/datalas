<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:webmaster');
        $this->middleware('auth')->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::findOrFail(1);

        return view('backend.settings.index', [
            'setting' => $setting,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail(1);

        return view('backend.settings.edit', [
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'about'         => 'required',
            'address'       => 'required|max:255',
            'telphone'     => 'required|min:12|regex:/^[0-9+() ]*$/',
            'phone'         => 'required|min:12|regex:/^[0-9+]*$/',
            'maps_url'      => 'required',
            'facebook_url'  => 'required',
            'twitter_url'   => 'required',
            'instagram_url' => 'required',
        ])->validate();

        $setting = Setting::whereId($id)->update([
            'about'         => $request->get('about'),
            'address'       => $request->get('address'),
            'telphone'      => $request->get('telphone'),
            'phone'         => $request->get('phone'),
            'maps_url'      => $request->get('maps_url'),
            'facebook_url'  => $request->get('facebook_url'),
            'twitter_url'   => $request->get('twitter_url'),
            'instagram_url' => $request->get('instagram_url'),
        ]);

        return redirect()->route('backend.misc.settings.index')->with('success', 'Berhasil mengubah pengaturan website');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
