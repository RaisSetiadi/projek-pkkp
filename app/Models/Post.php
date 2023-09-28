<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
    ];

    public function pesananDetail(){
        return $this->hasMany('App\PesananDetail','post_id','id');

    }
}
