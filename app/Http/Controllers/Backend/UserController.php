<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:webmaster|admin');
        $this->middleware('auth')->except(['create', 'show', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role(['bod', 'webmaster', 'admin'])->get();

        return view('backend.users.index', [
            'no'    => 1,
            'users' => $users, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'first_name'    => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'last_name'     => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'email'         => 'required|email|unique:users',
            'phone'         => 'required|regex:/^[0-9]*$/|max:20',
            'role'          => 'required',
        ])->validate();

        $user = User::create([
            'first_name'    => ucwords($request->get('first_name')),
            'last_name'     => ucwords($request->get('last_name')),
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone'),
            'password'      => bcrypt('d4t4las00'),
        ]);
        $user->assignRole($request->get('role'));

        return redirect()->route('backend.users.index')->with('success', 'Berhasil menambahkan Administrator baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.edit', [
            'user'  => $user,
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
        if (\Auth::user()->id != $id) {
            $validation = \Validator::make($request->all(), [
                'role'     => 'required',
            ])->validate();
    
            $user = User::findOrFail($id);
            $user->syncRoles($request->get('role'));
    
            return redirect()->route('backend.users.index')->with('success', 'Berhasil mengubah role dari '.$user->name.'!');
        }

        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->id != $id) {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admins.index')->with('success', 'Berhasil menghapus Administrator '.$user->name.'!');
        }

        return abort(403);
    }
}