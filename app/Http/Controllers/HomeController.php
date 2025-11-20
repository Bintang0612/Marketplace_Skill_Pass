<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
       $produks = Produk::latest()->take(8)->get();
        return view('member.home', compact('produks'));
    }
    public function produk(){
        $data['produk'] = Produk::all();
        return view('member.produk', $data);
    }
    public function toko(){
        $data['toko'] = Toko::all();
        return view('member.toko', $data);
    }
}
