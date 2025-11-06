<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.home');
    }
    public function users(){
        return view('admin.users');
    }
    public function produk(){
        return view('admin.produk');
    }
    public function toko(){
        return view('admin.toko');
    }
}
