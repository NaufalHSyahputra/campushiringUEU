<?php

namespace App\Http\Controllers\Auth;

use App\Models\Tbluser;
use App\Models\Tblmahasiswa;
use Illuminate\Http\Request;
use App\Models\Tblperusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

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
        /*Check apakah user yang login itu mahasiswa*/
        if (Tblmahasiswa::where('user_id', $user->user_id)->count() > 0) {
            if (Tblmahasiswa::where('user_id', $user->user_id)->first()->is_approved == 0) {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'Akun anda belum di approve oleh Career Center Universitas Esa Unggul');
            } else {
                return redirect()->route('index');
            }
            /*Check apakah usr yang login itu perusahaan */
        } else if (Tblperusahaan::where('user_id', $user->user_id)->count() > 0){
            if (Tblperusahaan::where('user_id', $user->user_id)->first()->is_approved == 0) {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'Akun anda belum di approve oleh Career Center Universitas Esa Unggul');
            } else {
                return redirect()->route('home');
            }
        }
    }
}
