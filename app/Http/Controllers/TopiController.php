<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topi;

//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class TopiController extends Controller
{
    //
    public function index(): View
    {
        $topis = Topi::latest()->paginate(5);
        return view('topi.index',compact('topis'));
    }
    public function create(): View
    {
        return view('topi.create');
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
        $image->storeAs('public/topi', $image->hashName());
 
        //create sneakers
        Topi::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,
 
        ]);
 
        //redirect to index
        return redirect()->route('topi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $topis = Topi::findOrFail($id);
 
        //render view with post
        return view('topi.edit', compact('topis'));
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
        $topis = Topi::findOrFail($id);
 
        //check if image is uploaded
        if ($request->hasFile('image')) {
 
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/topi', $image->hashName());
 
            //delete old image
            Storage::delete('public/topi/'.$topis->image);
 
            //update post with new image
            $topis->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
 
        } else {
 
            //update post without image
            $topis->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }
 
        //redirect to index
        return redirect()->route('topi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $topis = Topi::findOrFail($id);
 
        //delete image
        Storage::delete('public/topi/'. $topis->image);
 
        //delete post
        $topis->delete();
 
        //redirect to index
        return redirect()->route('topi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
 }
 
