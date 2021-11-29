<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserLog;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $community = Community::with(['province', 'origin'])->where('user_id', \Auth::user()->id)->firstOrFail();

        return view('frontend.communities.index', [
            'community' => $community
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
        $community = Community::where('user_id', \Auth::user()->id)->firstOrFail();

        return view('frontend.communities.edit', [
            'community' => $community
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
            'community_name'    => 'required|max:200',
            'contact_name'      => 'required|max:200',
            'contact_phone'     => 'required|max:20|regex:/^[0-9]*$/',
            'province'          => 'required|regex:/^[0-9]*$/',
            'origin'            => 'required|regex:/^[0-9]*$/',
            'address'           => 'required',
            'status_option'     => 'required|boolean'
        ])->validate();

        $community = Community::whereId($id)->update([
            'name'          => $request->get('community_name'),
            'slug'          =>\Str::slug($request->get('community_name'), '-'),
            'province_id'   => $request->get('province'),
            'origin_id'     => $request->get('origin'),
            'address'       => $request->get('address'),
            'contact_name'  => $request->get('contact_name'),
            'contact_phone' => $request->get('contact_phone'),
            'is_active'     => $request->get('status_option'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah komunitas '.$request->get('community_name'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('front.community.communities.index')->with('success', 'Berhasil mengubah Komunitas ' . $request->get('community_name') . '!');
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
