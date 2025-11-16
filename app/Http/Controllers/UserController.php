<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function auth(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validation)){
            if(Auth::user()->role === 'admin'){
                return redirect()->route('dashboard');
            } elseif(Auth::user()->role === 'member'){
                return redirect()->route('home');
            }
        }
    }
    public function logoutM(){
        Auth::logout();
        return redirect()->route('home');
    }
}
