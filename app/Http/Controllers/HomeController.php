<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
       $produks = Produk::latest()->take(8)->get();
        return view('member.home', compact('produks'));
    }
}
