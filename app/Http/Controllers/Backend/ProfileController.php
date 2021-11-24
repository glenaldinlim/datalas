<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:bod|webmaster|admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(\Auth::user()->id);

        return view('backend.users.profiles.index', [
            'user'  => $user,
        ]);

    }

    public function updateProfile(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'first_name'    => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'last_name'     => 'required|max:100|regex:/^[A-Za-z ]*$/',
            'gender'        => 'required|max:1|regex:/^[MF]*$/',
            'phone'         => 'required|regex:/^[0-9]*$/|max:20',
            'avatar'        => 'nullable|image|max:3072'
        ])->validate();

        $user = User::findOrFail(\Auth::user()->id);
        $user->first_name   = $request->get('first_name');
        $user->last_name    = $request->get('last_name');
        $user->gender       = $request->get('gender');
        $user->phone        = $request->get('phone');
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('users', 'public');
            $user->avatar = $path;
        }
        $user->save();

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah profile akun pribadi',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.users.profiles.index')->with('success', 'Berhasil mengubah biodata!');
    }

    public function updateEmail(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.\Auth::user()->id,
        ])->validate();

        $user = User::whereId(\Auth::user()->id)
                        ->update([
                            'email' => $request->get('email'),
                        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah email akun pribadi',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.users.profiles.index')->with('success', 'Berhasil mengubah email!');
    }

    public function updatePassword(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ])->validate();

        $user = User::whereId(\Auth::user()->id)
                        ->update([
                            'password' => \Hash::make($request->get('password'))
                        ]);

        UserLog::create([
            'user_id'       => \Auth::user()->id,
            'description'   => 'telah mengubah password akun pribadi',
            'ip_address'    => $request->ip(),
            'browser'       => $request->header('User-Agent'),
        ]);

        return redirect()->route('backend.users.profiles.index')->with('success', 'Berhasil mengubah kata sandi!');
    }
}
