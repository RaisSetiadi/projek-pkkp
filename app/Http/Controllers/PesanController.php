<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Trousers;

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
    public function trousers($id)
    {
        $trouser = Trousers::where('id',$id)->first();
        return view('pesan.trousers',compact('trouser'));
    }
    public function pesan($id)
    {
        $posts = Post::where('id',$id)->first();
        return view('pesan.pesan',compact('posts'));

    }
}
