<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AlertMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->remember == 'true' ? TRUE : FALSE;
        if(\Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with(AlertMessage::danger('Username atau password salah.', title: 'Login Gagal!'));
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('auth.login');
    }
}
