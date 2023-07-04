<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('image')->get();
        return view('users/index', [
            'user' => $user
        ]);
    }

    public function changePassword()
    {
        return view('users/change-password');
    }

    public function processChangePassword(Request $request)
    {
        if(!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'old password not match with your current password');
        }

        if($request->new_password != $request->repeat_password) {
            return back()->with('error', 'new password and repeat password not match');
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', 'change password success');
    }
}
