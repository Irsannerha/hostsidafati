<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function redirectTo()
    {
        
        if(auth()->user()->role == 'superadmin'){
                $redirectTo = '/superadmin/dashboard';
                return $redirectTo;
        }
        elseif(auth()->user()->role == 'pegawai'){
            $redirectTo = '/pegawai/dashboard';
            return $redirectTo;
        }
        elseif(auth()->user()->role == 'akademik'){
            $redirectTo = '/akademik/dashboard';
            return $redirectTo;
        }
        elseif(auth()->user()->role == 'kemahasiswaan'){
            $redirectTo = '/kemahasiswaan/dashboard';
            return $redirectTo;
        }
        elseif(auth()->user()->role == 'keuangan'){
            $redirectTo = '/keuangan/dashboard';
            return $redirectTo;
        }
        elseif(auth()->user()->role == 'prodi'){
            $redirectTo = '/prodi/dashboard';
            return $redirectTo;
        }
        else {
                $redirectTo = '/login';
                return $redirectTo;
        }
        
    }

    // public function __construct()
    // {
    //     $middleware('guest')->except('logout');
    // }
}
