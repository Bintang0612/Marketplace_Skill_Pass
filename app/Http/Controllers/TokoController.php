<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class TokoController extends Controller
{
    //
    public function toko(){
        $data['toko'] = Toko::all();
        $data['users'] = User::all();
        return view('admin.toko', $data);
    }
    public function tokoS(Request $request)
{
    $request->validate([
        'nama_toko' => 'required',
        'kontak_toko' => 'required',
        'id_users' => 'required',
        'alamat' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Cek user sudah punya toko
    if (Toko::where('id_users', $request->id_users)->exists()) {
        return back()->with('error', 'Users sudah punya toko');
    }

    // Upload gambar
    if ($request->hasFile('gambar')) {
        $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('public/foto-toko', $filename);
        $data['gambar'] = $filename;
    }

    $data = $request->all();
    $data['gambar'] = $filename;

    Toko::create($data);

    return redirect()->back()->with('success', 'Toko berhasil ditambahkan');
    }


    public function tokoU(Request $request, $id)
{
    $request->validate([
        'nama_toko' => 'required',
        'kontak_toko' => 'required',
        'id_users' => 'required',
        'alamat' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $toko = Toko::findOrFail($id);

    // Update field biasa
    $toko->nama_toko   = $request->nama_toko;
    $toko->kontak_toko = $request->kontak_toko;
    $toko->id_users    = $request->id_users;
    $toko->alamat      = $request->alamat;
    $toko->deskripsi   = $request->deskripsi;

    // Update gambar jika ada
    if ($request->hasFile('gambar')) {

        // hapus gambar lama
        $oldPath = public_path('public/foto-toko/'.$toko->gambar);
        if(File::exists($oldPath)){
            File::delete($oldPath);
        }

        $file = $request->file('gambar');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('public/foto-toko'), $namaFile);

        $toko->gambar = $namaFile;
    }

    $toko->save();

    return redirect()->back()->with('success', 'Toko berhasil diperbarui');
}


    public function tokoD($id){
       try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }
        Toko::where('id', $id)->delete();
        return redirect()->back()->with('error', 'toko berhasil dihapus');
    }
}
