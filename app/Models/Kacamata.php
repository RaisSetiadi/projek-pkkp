<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kacamata extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
    ];
}
