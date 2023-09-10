<?php

namespace App\Http\Controllers;
//import Model "aksesories
use App\Models\Aksesosrie;

//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class AksesoriesController extends Controller
{
    //
       /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $aksesoris = Aksesosrie::latest()->paginate(5);

        //render view with aksesoris
        return view('aksesoris.index', compact('aksesoris'));
    }
    public function create(): View
    {
        return view('aksesoris.create');
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
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required|min:5',
            'stok'   => 'required|min:2',
            'deskripsi'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/aksesoris', $image->hashName());

        //create post
        Aksesosrie::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('aksesoris.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    public function show(string $id): View
    {
        //get aksesoris  by ID
        $aksesoris  = Aksesosrie::findOrFail($id);

        //render view with aksesoris 
        return view('aksesoris.show', compact('aksesoris'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $aksesoris = Aksesosrie::findOrFail($id);

        //render view with post
        return view('aksesoris.edit', compact('aksesoris'));
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
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required|min:5',
            'stok'   => 'required|min:2',
            'deskripsi'   => 'required|min:10'
        ]);

        //get post by ID
        $aksesoris = Aksesosrie::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/aksesoris', $image->hashName());

            //delete old image
            Storage::delete('public/aksesoris/'.$aksesoris->image);

            //update post with new image
            $aksesoris->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $aksesoris->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('aksesoris.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $aksesoris = Aksesosrie::findOrFail($id);

        //delete image
        Storage::delete('public/aksesoris/'. $aksesoris->image);

        //delete post
        $aksesoris->delete();

        //redirect to index
        return redirect()->route('aksesoris.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        // mengambil data dari table pegawai sesuai pencarian data
        $aksesoris = Aksesosrie::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);


        // mengirim data pegawai ke view index
        return view('aksesoris.index', compact('aksesoris'));
    }

}
