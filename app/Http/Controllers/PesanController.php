<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $posts = Post::where('id',$id)->first();
        return view('pesan.index',compact('posts'));

    }
    public function pesan($id)
    {
        $posts = Post::where('id',$id)->first();
        return view('pesan.pesan',compact('posts'));

    }
}
