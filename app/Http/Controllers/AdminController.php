<?php

namespace App\Http\Controllers;

use App\Models\Gambar_produk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //
    public function index(){
        $data['user'] = User::all();
        $data['produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.dashboard', $data);
    }
    public function users(){
        $data['user'] = User::all();
        return view('admin.users', $data);
    }
    public function usersP(Request $request){
            $request->validate([
            'nama' => 'required|string',
            'kontak' => 'required|numeric|max:13',
            'username' => 'required|string',
            'password' => 'required',
            'role' => 'required',
        ]);
        $request['password'] = bcrypt($request['password']);

        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return redirect()->route('admin.users')->with('success', 'tambah user berhasil');
    }
    public function usersU(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $user = User::find($id);

        $validate = $request->validate([
            'nama' => 'required',
            'kontak' => 'required|numeric',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user->update($validate);

        return redirect()->route('admin.users')->with('success', 'data berhasil di edit');
    }
    public function usersD(string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        Gambar_produk::whereHas('produk', function ($query) use ($id) {
            $query->where('id_tokos', $id);
        });
        Produk::where('id_tokos', $id)->delete();
        Toko::where('id_users', $id)->delete();
        User::find($id)->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
