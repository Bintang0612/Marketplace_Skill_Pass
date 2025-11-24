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
    public function produk(Request $request){
        $search = $request->input('search');

        $query = Produk::query();

        if ($search) {
            $query->where('nama_produk', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $data['produk'] = $query->get();

        return view('member.produk', $data);
    }

    public function toko(){
        $data['toko'] = Toko::all();
        return view('member.toko', $data);
    }
}
