<?php

namespace App\Http\Controllers;

use App\Models\Gambar_produk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
        'id_kategoris' => 'required',
        'id_tokos' => 'required',
        'nama_produk' => 'required|max:50',
        'deskripsi' => 'required',
        'harga' => 'required|integer',
        'stok' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $produk = Produk::create([
        'id_kategoris' => $request->id_kategoris,
        'id_tokos' => $request->id_tokos,
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'tanggal_upload' => now(),
    ]);

    // proses upload gambar
    $namaFile = null;
    if ($request->hasFile('gambar')) {
        $namaFile = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('public/foto-produk'), $namaFile);

        Gambar_produk::create([
            'id_produks' => $produk->id,
            'nama_gambar' => $namaFile,
        ]);
    }

    return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function produkU(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $request->validate([
        'id_kategoris' => 'required',
        'id_tokos' => 'required',
        'nama_produk' => 'required|max:50',
        'deskripsi' => 'required',
        'harga' => 'required|integer',
        'stok' => 'required|integer',
        'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $produk->update([
        'id_kategoris' => $request->id_kategoris,
        'id_tokos' => $request->id_tokos,
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    // === HAPUS GAMBAR LAMA ===
    if ($request->hasFile('gambar')) {

        $gambarLama = Gambar_produk::where('id_produks', $produk->id)->get();

        foreach ($gambarLama as $gmbr) {
            if (file_exists(storage_path('app/' . $gmbr->nama_gambar))) {
                unlink(storage_path('app/' . $gmbr->nama_gambar));
            }
            $gmbr->delete();
        }

        // === SIMPAN GAMBAR BARU ===
        if ($request->hasFile('gambar')) {
        $namaFile = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('public/foto-produk'), $namaFile);

        Gambar_produk::create([
            'id_produks' => $produk->id,
            'nama_gambar' => $namaFile,
        ]);
    }
    }

    return back()->with('success', 'Produk berhasil diperbarui!');
}


    public function produkD($id)
    {
        Produk::where('id', $id)->delete();

        return back()->with('success', 'Produk dan gambarnya berhasil dihapus!');
    }
}
