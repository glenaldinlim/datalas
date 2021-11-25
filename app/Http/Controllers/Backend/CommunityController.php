<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserLog;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:webmaster|admin');
        $this->middleware('auth')->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $communities = Community::all();

        return view('backend.communities.index', [
            'no'            => 1,
            'communities'   => $communities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.communities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'first_name'        => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'last_name'         => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'email'             => 'required|email|unique:users',
            'phone'             => 'required|regex:/^[0-9]*$/|max:20',
            'password'          => 'required|min:8',
            'community_name'    => 'required|max:200',
            'contact_name'      => 'required|max:200',
            'contact_phone'     => 'required|max:20|regex:/^[0-9]*$/',
            'province'          => 'required|regex:/^[0-9]*$/',
            'origin'            => 'required|regex:/^[0-9]*$/',
            'address'           => 'required',
        ])->validate();

        $user = User::create([
            'first_name'    => ucwords($request->get('first_name')),
            'last_name'     => ucwords($request->get('last_name')),
            'email'         => $request->get('email'),
            'phone'         => $request->get('contact_phone'),
            'password'      => $request->get('password'),
        ]);
        $user->assignRole('community');

        $community = Community::create([
            'user_id'       => $user->id,
            'name'          => $request->get('community_name'),
            'slug'          =>\Str::slug($request->get('community_name'), '-'),
            'province_id'   => $request->get('province'),
            'origin_id'     => $request->get('origin'),
            'address'       => $request->get('address'),
            'contact_name'  => $user->name,
            'contact_phone' => $request->get('contact_phone'),
        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah menambahkan user'.$request->get('email').' dan komunitas '.$request->get('community_name'),
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.communities.index')->with('success', 'Berhasil menambahkan Komunitas baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $community = Community::with('user')->findOrFail($id);

        return view('backend.communities.show', [
            'community' => $community,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $community = Community::findOrFail($id);

        return view('backend.communities.edit', [
            'community' => $community,
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

        return redirect()->route('backend.communities.index')->with('success', 'Berhasil mengubah Komunitas ' . $request->get('community_name') . '!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $community = Community::findOrFail($id);
            $community->delete();

            UserLog::create([
                'user_id'       => \Auth::user()->id,
                'description'   => 'telah menghapus komunitas '.$community->name,
                'ip_address'    => $request->ip(),
                'browser'       => $request->header('User-Agent'),
            ]);

            return redirect()->route('backend.communities.index')->with('success', 'Berhasil Menghapus Komunitas ' . $community->name . '!');
        } catch (\Illuminate\Database\QueryException $err) {
            return redirect()->route('backend.communities.index')->with('danger','Komunitas gagal dihapus. Code: SQLSTATE['.$err->getCode().']');
        }

    }
}
