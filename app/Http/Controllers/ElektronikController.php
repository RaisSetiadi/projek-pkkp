<?php

namespace App\Http\Controllers;

use App\Models\Elektronik;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElektronikController extends Controller
{
    //
    public function index(): View
    {
        $elektroniks = Elektronik::latest()->paginate(5);
        return view('Elektronik.index', compact('elektroniks'));
    }
    public function create(): View
    {
        return view('Elektronik.create');
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
        $image->storeAs('public/Elektronik', $image->hashName());
        $foto_depan = $request->file('foto_depan');
        $foto_depan->storeAs('public/Elektronik', $foto_depan->hashName());
        $foto_belakang = $request->file('foto_belakang');
        $foto_belakang->storeAs('public/Elektronik', $foto_belakang->hashName());

        //create post
        Elektronik::create([
            'image'     => $image->hashName(),
            'foto_depan'     => $foto_depan->hashName(),
            'foto_belakang'     => $foto_belakang->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('Elektronik.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $elektroniks = Elektronik::findOrFail($id);

        //render view with post
        return view('Elektronik.edit', compact('elektroniks'));
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
        $elektroniks = Elektronik::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/Elektronik', $image->hashName());
            $foto_depan = $request->file('foto_depan');
            $foto_depan->storeAs('public/Elektronik', $foto_depan->hashName());
            $foto_belakang = $request->file('foto_belakang');
            $foto_belakang->storeAs('public/Elektronik', $foto_belakang->hashName());

            //delete old image
            Storage::delete('public/Elektronik/' . $elektroniks->image);

            //update maka$makanans with new image
            $elektroniks->update([
                'image'     => $image->hashName(),
                'foto_depan' => $foto_depan->hashName(),
                'foto_belakang' => $foto_belakang->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //update post without image
            $elektroniks->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('Elektronik.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $elektroniks = Elektronik::findOrFail($id);

        //delete image
        Storage::delete('public/Elektronik/' . $elektroniks->image);

        //delete post
        $elektroniks->delete();

        //redirect to index
        return redirect()->route('Elektronik.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
