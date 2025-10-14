<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'harga', 'image'];
    protected $visible  = ['nama', 'deskripsi', 'harga', 'image'];
}

