<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsTo('App\Post','posts_id','id');

    }
    public function pesanan(){
        return $this->belongsTo('App\Pesanan','pesanan_id','id');

    }
    
    
}
