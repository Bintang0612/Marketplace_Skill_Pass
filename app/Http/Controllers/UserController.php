<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                return redirect()->route('home')->with('success', 'Login berhasil!');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Role pengguna tidak dikenali.');
            }
        } else {
            return redirect()->back()->with('error', 'Login gagal! Periksa username dan password Anda.');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function regist(Request $request){
        return view('registrasi');
    }
    public function registrasi(Request $request){
        $validation = $request->validate([
            'nama' => 'required|string',
            'kontak' => 'required|numeric',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validation['password'] = bcrypt($validation['password']);
        $validation['role'] = 'member';

        User::create($validation);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
