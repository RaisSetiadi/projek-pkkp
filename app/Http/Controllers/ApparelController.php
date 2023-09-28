<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class ApparelController extends Controller
{
    //
    public function index()
    {
        $posts = Post::paginate(5);
        dd($posts);
        return view('/apparel',compact('posts'));
    }
}
