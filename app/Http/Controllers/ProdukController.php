<?php

namespace App\Http\Controllers;

use App\Models\Gambar_produk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->gambar->move(public_path('storage/foto-produk'), $namaFile);

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
        $request->gambar->move(public_path('storage/foto-produk'), $namaFile);

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

    public function detailP($id){
        $produk = Produk::with('gambar_produks')->findOrFail($id);
        $toko = Toko::all();
        return view('member.produk.produk-detail', compact('produk', 'toko'));
    }


    public function storeP(Request $request){
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'id_kategoris' => 'required',
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'id_tokos' => Toko::where('id_users', auth()->id())->first()->id,
            'id_kategoris' => $request->id_kategoris,
            'tanggal_upload' => now(),
        ]);

        if($request->hasFile('gambar')){
            foreach($request->file('gambar') as $file){
                $namaFile = $file->store('foto-produk', 'public');

                Gambar_produk::create([
                    'id_produks' => $produk->id,
                    'nama_gambar' => str_replace('foto-produk/','',$namaFile),
                ]);
            }
        }

        return redirect()->back()->with('success','Produk berhasil ditambahkan!');
    }

    public function updateP(Request $request, $id){
        $produk = Produk::findOrFail($id);

        $request->validate([
            'id_kategoris' => 'required',
            'nama_produk' => 'required|max:50',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $produk->update([
            'id_kategoris' => $request->id_kategoris,
            'id_tokos' => Auth::user()->toko->id,
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return back()->with('success', 'Produk berhasil diperbarui!');
    }
    public function deleteP($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar terkait
        $gambarProduk = Gambar_produk::where('id_produks', $produk->id)->get();
        foreach ($gambarProduk as $gmbr) {
            $filePath = public_path('storage/foto-produk/' . $gmbr->nama_gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $gmbr->delete();
        }
        // Hapus produk
        $produk->delete();

        return back()->with('success', 'Produk dan gambarnya berhasil dihapus!');
    }
    public function tambahGambar(Request $request, $id)
    {
        $request->validate([
            'gambar_produk.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $file) {
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/foto-produk'), $namaFile);

                Gambar_produk::create([
                    'id_produks' => $produk->id,
                    'nama_gambar' => $namaFile,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Gambar produk berhasil ditambahkan!');
    }
}
