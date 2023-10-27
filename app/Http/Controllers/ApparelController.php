<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Baju;
use App\Models\Celana;
use App\Models\Kacamata;
use App\Models\Topi;
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
    public function home()
    {
      
            $posts = Post::paginate(4 );
            $bajus = Baju::all();
            $celanas = Celana::all();
            $kacamatas = Kacamata::all();
            $topis = Topi::all();
            return view('pakaian.home',compact('posts','bajus','celanas','kacamatas','topis'));
    
    }
}
