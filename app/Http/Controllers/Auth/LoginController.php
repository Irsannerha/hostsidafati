<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated($request, $user)
    {
        if ($user->role == 'superadmin') {
            $redirectTo = '/superadmin/dashboard';
        } elseif ($user->role == 'pegawai') {
            $redirectTo = '/pegawai/dashboard';
        } elseif ($user->role == 'akademik') {
            $redirectTo = '/akademik/dashboard';
        } elseif ($user->role == 'kemahasiswaan') {
            $redirectTo = '/kemahasiswaan/dashboard';
        } elseif ($user->role == 'keuangan') {
            $redirectTo = '/keuangan/dashboard';
        } elseif ($user->role == 'prodi') {
            $redirectTo = '/prodi/dashboard';
        } else {
            $redirectTo = '/login';
        }

        session()->flash('success', 'Selamat datang, Admin ' . $user->role);

        return redirect()->intended($redirectTo);
    }

    protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {
        session()->flash('error', 'Email atau passwordnya salah nih, coba dicek lagi ya.');
        return redirect()->back()->withInput($request->only($this->username(), 'remember'));
    }

    // public function __construct()
    // {
    //     $middleware('guest')->except('logout');

    // }
}
