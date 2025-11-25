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
       $toko = Toko::take(4)->get();
        return view('member.home', compact('produks', 'toko'));
    }
    public function produk(Request $request){
        $search = $request->input('search');

        $query = Produk::with('gambar_produks');

        if ($search) {
            $query->where('nama_produk', 'like', "%{$search}%");
        }

        $data['produk'] = $query->get();

        return view('member.produk.produk', $data);
    }

    public function toko(){
        $data['toko'] = Toko::all();
        return view('member.toko.toko', $data);
    }
}
