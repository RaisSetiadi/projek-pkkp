<?php

namespace App\Http\Controllers;

use App\Models\MakananSehat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakanansehatController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $makanans = MakananSehat::all();

        //render view with posts
        return view('MakananSehat.index', compact('makanans'));
    }
    public function create(): View
    {
        return view('MakananSehat.create');
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
        $image->storeAs('public/MakananSehat', $image->hashName());
        $foto_depan = $request->file('foto_depan');
        $foto_depan->storeAs('public/MakananSehat', $foto_depan->hashName());
        $foto_belakang = $request->file('foto_belakang');
        $foto_belakang->storeAs('public/MakananSehat', $foto_belakang->hashName());

        //create post
        MakananSehat::create([
            'image'     => $image->hashName(),
            'foto_depan'     => $foto_depan->hashName(),
            'foto_belakang'     => $foto_belakang->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('MakananSehat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $makanans = MakananSehat::findOrFail($id);

        //render view with post
        return view('MakananSehat.edit', compact('makanans'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
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

        //get post by ID
        $makanans = MakananSehat::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/MakananSehat', $image->hashName());
            $foto_depan = $request->file('foto_depan');
            $foto_depan->storeAs('public/MakananSehat', $foto_depan->hashName());
            $foto_belakang = $request->file('foto_belakang');
            $foto_belakang->storeAs('public/MakananSehat', $foto_belakang->hashName());

            //delete old image
            Storage::delete('public/MakananSehat/'.$makanans->image);

            //update maka$makanans with new image
            $makanans->update([
                'image'     => $image->hashName(),
                'foto_depan'=> $foto_depan->hashName(),
                'foto_belakang' => $foto_belakang->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $makanans->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('MakananSehat.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $makanans = MakananSehat::findOrFail($id);

        //delete image
        Storage::delete('public/MakananSehat/'. $makanans->image);

        //delete post
        $makanans->delete();

        //redirect to index
        return redirect()->route('MakananSehat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
