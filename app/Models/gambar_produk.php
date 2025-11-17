<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar_produk extends Model
{
    //
    protected $guarded = [];
    public function produk(){
        return $this->belongsTo(Produk::class, 'id_produks');
    }
}
