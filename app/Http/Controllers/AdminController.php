<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.home');
    }
    public function users(){
        $data['user'] = User::all();
        return view('admin.users', $data);
    }
    public function usersC(){
        return view('admin.users-create');
    }
    public function usersP(Request $request){
        $validate = $request->validate([
            'nama' => 'required|string',
            'kontak' => 'required|max:13',
            'username' => 'required|string',
            'password' => 'required',
            'role' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);

        User::create([
            'nama' => $validate['nama'],
            'kontak' => $validate['kontak'],
            'username' => $validate['username'],
            'password' => $validate['password'],
            'role' => $validate['role'],
        ]);
        return redirect()->route('users')->with('success', 'tambah user berhasil');
    }
    public function usersE(Request $request, string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        $data['user'] = User::find($id);
        return view('admin.users-edit', $data);
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
            'kontak' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user->update($validate);

        return redirect()->route('users')->with('success', 'data berhasil di edit');
    }
    public function usersD(string $id){
        try{
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e){
            return redirect()->back();
        }

        User::destroy($id);
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
    public function produk(){
        return view('admin.produk');
    }
    public function toko(){
        return view('admin.toko');
    }
}
