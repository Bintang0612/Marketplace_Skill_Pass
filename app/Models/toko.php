<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsto(User::class, 'id_users');
    }

    public function produk(){
        return $this->hasMany(Produk::class, 'id_tokos'); // sesuaikan foreign key produk
    }
}
