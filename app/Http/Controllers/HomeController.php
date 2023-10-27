<?php

namespace App\Http\Controllers;

use App\Models\Aksesosrie;
use App\Models\Post;
use App\Models\Sneakers;
use App\Models\Trousers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(4);
        $trouser = Trousers::paginate(4);
        $sneaker = Sneakers::paginate(4);
        $aksesoris = Aksesosrie::all();
        return view('layouts.navUtama', compact('posts', 'trouser', 'sneaker', 'aksesoris'));
    }
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        // mengambil data dari table pegawai sesuai pencarian data
        $sneaker = Sneakers::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $trouser = Trousers::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $posts = Post::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $aksesoris = Aksesosrie::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);


        // mengirim data pegawai ke view index
        return view('layouts.navUtama', compact('sneaker', 'trouser', 'posts', 'aksesoris'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
}
