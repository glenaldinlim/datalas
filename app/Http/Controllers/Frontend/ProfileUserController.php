<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:community');
    }
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(\Auth::user()->id);

        return view('frontend.users.profiles.index', [
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

        return redirect()->route('frontend.users.profiles.index')->with('success', 'Berhasil mengubah biodata!');
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

        return redirect()->route('frontend.users.profiles.index')->with('success', 'Berhasil mengubah email!');
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

        return redirect()->route('frontend.users.profiles.index')->with('success', 'Berhasil mengubah kata sandi!');
    }
}


//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
