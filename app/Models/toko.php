<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsto(User::class, 'users_id');
    }
}
