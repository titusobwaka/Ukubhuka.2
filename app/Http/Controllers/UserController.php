<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:16'
        ]);

        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $reg_success = $user->save();

        if ($reg_success) {
            return back()->with('success', 'Account created successfully!');
        } else {
            return back()->with('error', 'Something went wrong!');
        }

    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:16'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('sessionID', $user->user_id);
                return redirect('/dashboard');

            } else {
                return back()->with('fail', 'Invalid Password');
            }
        } else {
            return back()->with('fail', 'This Email is not registered!');
        }


    }

}