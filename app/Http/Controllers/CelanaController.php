<?php

namespace App\Http\Controllers;
//import Model "Celana
use App\Models\Celana;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class CelanaController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $celanas = Celana::latest()->paginate(5);

        //render view with posts
        return view('celana.index', compact('celanas'));
    }
    public function create(): View
    {
        return view('celana.create');
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
        $image->storeAs('public/celana', $image->hashName());
 
        //create sneakers
        Celana::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,
 
        ]);
 
        //redirect to index
        return redirect()->route('celana.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $celanas = Celana::findOrFail($id);
 
        //render view with post
        return view('celana.edit', compact('celanas'));
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
        $celanas = Celana::findOrFail($id);
 
        //check if image is uploaded
        if ($request->hasFile('image')) {
 
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/celana', $image->hashName());
 
            //delete old image
            Storage::delete('public/celana/'.$celanas->image);
 
            //update post with new image
            $celanas->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
 
        } else {
 
            //update post without image
            $celanas->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }
 
        //redirect to index
        return redirect()->route('celana.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $celanas = Celana::findOrFail($id);
 
        //delete image
        Storage::delete('public/baju/'. $celanas->image);
 
        //delete post
        $celanas->delete();
 
        //redirect to index
        return redirect()->route('celana.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
  
}
