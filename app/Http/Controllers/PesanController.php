<?php

namespace App\Http\Controllers;

use App\Models\Aksesosrie;
use App\Models\Baju;
use App\Models\Pesanan;
use App\Models\Celana;
use App\Models\Kacamata;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sneakers;
use App\Models\Topi;
use App\Models\Trousers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $posts = Post::where('id', $id)->first();
        return view('pesan.index', compact('posts'));
    }
    public function makanan($id)
    {
        $trouser = Trousers::where('id', $id)->first();
        return view('pesan.makanan', compact('trouser'));
    }
    public function sneakers($id)
    {
        $sneaker = Sneakers::where('id', $id)->first();
        return view('pesan.sneakers', compact('sneaker'));
    }
    public function barangbekas($id)
    {
        $aksesoris = Aksesosrie::where('id', $id)->first();
        return view('pesan.barangbekas', compact('aksesoris'));
    }
    public function pakaian($id)
    {
        $posts = Post::where('id', $id)->first();
        return view('pesan.pakaian', compact('posts'));
    }
    public function baju($id)
    {
        $bajus = Baju::where('id', $id)->first();
        return view('pesan.baju', compact('bajus'));
    }
    public function celana($id)
    {
        $celanas = Celana::where('id', $id)->first();
        return view('pesan.celana', compact('celanas'));
    }
    public function kacamata($id)
    {
        $kacamatas = Kacamata::where('id', $id)->first();
        return view('pesan.kacamata', compact('kacamatas'));
    }
    public function topi($id)
    {
        $topis = Topi::where('id', $id)->first();
        return view('pesan.topi', compact('topis'));
    }
    public function pesan(Request $request, $id)
    {
        $posts = Post::where('id', $id)->first();
        $tanggal = Carbon::now();

        // validasi apakah melebihi stok
        if ($request->jumlah_pesan > $posts->stok) {
            return redirect('pesanPakaian/' . $id);
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //simpan ke dalam databases pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }


        // simpan ke dalam pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('posts_id', $posts->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->posts_id = $posts->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $posts->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {

            $pesanan_detail = PesananDetail::where('post_id', $posts->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
            $harga_pesanan_detail_baru = $posts->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga +  $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        // jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $posts->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/home');
    }
    public function checkout()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('pesan.checkout', compact('pesanan', 'pesanan_details'));
    }
}
