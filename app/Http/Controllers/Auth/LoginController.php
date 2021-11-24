<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
        if (Auth::user()->role_name == 'Community') {
            return redirect(RouteServiceProvider::COMMUNITY);
        } else if (Auth::user()->role_name == 'Bod' || Auth::user()->role_name == 'Webmaster' || Auth::user()->role_name == 'Admin') {
            return redirect(RouteServiceProvider::ADMIN);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->role_name == 'Community') {
            UserLog::create([
                'user_id'       => \Auth::user()->id,
                'description'   => 'telah login ke sistem DATALAS',
                'is_login'      => 1,
                'ip_address'    => $request->ip(),
                'browser'       => $request->header('User-Agent'),
            ]);

            return redirect()->intended(RouteServiceProvider::COMMUNITY);
        } else if (Auth::user()->role_name == 'Bod' || Auth::user()->role_name == 'Webmaster' || Auth::user()->role_name == 'Admin') {
            UserLog::create([
                'user_id'       => \Auth::user()->id,
                'description'   => 'telah login ke sistem DATALAS',
                'is_login'      => 1,
                'ip_address'    => $request->ip(),
                'browser'       => $request->header('User-Agent'),
            ]);
            
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
    }
}
