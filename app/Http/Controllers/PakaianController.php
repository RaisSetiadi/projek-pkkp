<?php

namespace App\Http\Controllers;
use App\Models\Trousers;

use Illuminate\Http\Request;

class PakaianController extends Controller
{
    //
       //
       public function index()
       {
           $trouser = Trousers::paginate(5);
           dd($trouser);
           return view('layouts.navUtama',compact('posts'));
       }
}
