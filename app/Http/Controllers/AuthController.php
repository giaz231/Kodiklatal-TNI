<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {   
        return view('page/login');
    }

    public function actionLogin(Request $request)
    {
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            return redirect()->back()->with('login-fail', 'Wrong email or password');
        }
        return redirect()->route('dashboard');
    }


/*
    public function actionSignUp(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('signup-success', 'Account successfully created');;
    }
    */

    public function actionLogout() {
        Auth::logout();
        return redirect()->route('loginPage');
    }
}
