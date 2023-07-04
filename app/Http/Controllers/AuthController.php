<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths/login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard/backend');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Wrong!');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register()
    {
        return view('auths/register');
    }

    public function registerProcess(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_role = 3;
        $user->password = Hash::make($request->name);
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }

}
