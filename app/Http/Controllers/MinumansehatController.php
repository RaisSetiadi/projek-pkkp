<?php

namespace App\Http\Controllers;

use App\Models\MinumanSehat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MinumansehatController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $minumans = MinumanSehat::latest()->paginate(5);

        //render view with posts
        return view('MinumanSehat.index', compact('minumans'));
    }
    public function create(): View
    {
        return view('MinumanSehat.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'foto_depan'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'foto_belakang'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required|min:5',
            'stok'   => 'required|min:2',
            'deskripsi'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/MinumanSehat', $image->hashName());
        $foto_depan = $request->file('foto_depan');
        $foto_depan->storeAs('public/MinumanSehat', $foto_depan->hashName());
        $foto_belakang = $request->file('foto_belakang');
        $foto_belakang->storeAs('public/MinumanSehat', $foto_belakang->hashName());

        //create post
        MinumanSehat::create([
            'image'     => $image->hashName(),
            'foto_depan'     => $foto_depan->hashName(),
            'foto_belakang'     => $foto_belakang->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('MinumanSehat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
