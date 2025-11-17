<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KategoriController extends Controller
{
    //
    public function kategori(){
        $data['kategori'] = Kategori::all();
        return view('admin.kategori', $data);
    }
    public function kategoriS(Request $request){
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('admin.kategori')->with('success', 'tambah kategori berhasil');
    }

    public function kategoriU(Request $request, string $id){
        $kategori = Kategori::find($id);

        $validate = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori->update($validate);
        return redirect()->route('admin.kategori')->with('success', 'kategori berhasil di ubah');
    }
    public function kategoriD($id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }
        Kategori::where('id',$id)->delete();
        return redirect()->back()->with('success', 'kategori berhasil dihapus');
    }
}
