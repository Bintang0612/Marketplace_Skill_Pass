<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //
    public function produk(){
        $data['produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.produk', $data);
    }
    public function produkS(Request $request){
        $validate = $request->validate([
            'id_kategoris' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required',
            'deskripsi' => 'required',
            'tanggal_upload' => 'required|date',
            'id_tokos' => 'required',
        ]);

        $produk = Produk::create([
            'id_kategoris' => $validate['id_kategoris'],
            'harga' => $validate['harga'],
            'stok' => $validate['stok'],
            'deskripsi' => $validate['deskripsi'],
            'tanggal_upload' => now(),
            'id_tokos' => $validate['id_tokos'],
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $index => $file) {
                $namaProduk = str_replace(' ', '_', strtolower($produk->nama_produk));
                $namaFile = $namaProduk . '' . time() . '' . $index . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('foto-produk', $namaFile, 'public');

                gambar_produk::create([
                    'id_produks' => $produk->id,
                    'gambar' => $path,
                ]);
            }
        }

        return redirect()->route('admin.produk')->with('success', 'produk berhasil  ditambahkan');
    }
}
