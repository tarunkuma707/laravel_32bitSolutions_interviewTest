<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if(FacadesAuth::attempt($credentials)){
            return redirect()->route('showallusers')->with('message','User Login successfully');
        }
        return redirect()->route('login')->with('message','User or password doesn\'t match');
    }

    public function checkLogin(){
        if (FacadesAuth::check()) {
            return redirect()->route('showallusers');
        }
        return view('login');
    }

    public function logout(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message','You are logged out successfully');
    }
}
