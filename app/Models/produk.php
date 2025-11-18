<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategoris');
    }
    public function toko(){
        return $this->belongsTo(Toko::class, 'id_tokos');
    }
    public function gambar_produks()
    {
        return $this->hasMany(gambar_produk::class,'id_produks');
    }
}
