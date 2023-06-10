<?php

namespace App\Http\Controllers;

use App\Helpers\AlertMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('akun.profile');
    }

    public function updateUsername(Request $request)
    {
        $data = $request->validate([
            'username' => 'required'
        ]);

        $user = \Auth::user();
        $user->username = $data['username'];
        if($user->save())
        {
            return redirect()->back()->with(AlertMessage::success('Username berhasil diubah', title: 'Berhasil!'));
        }
        return redirect()->back()->with(AlertMessage::danger('Username gagal diubah', title: 'Gagal!'));
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        if(!Hash::check($request->old_password, \Auth::user()->password))
        {
            return redirect()->back()->withErrors(['old_password'=>'Password lama salah']);
        }
        $user = \Auth::user();
        $user->password = Hash::make($data['password']);
        if($user->save())
        {
            return redirect()->route('auth.logout')->with(AlertMessage::success('Password berhasil diubah', title: 'Berhasil!'));

        }
        return redirect()->back()->with(AlertMessage::danger('Password gagal diubah', title: 'Gagal!'));

    }
}
