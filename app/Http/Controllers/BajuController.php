<?php

namespace App\Http\Controllers;
//import Model "Post
use App\Models\Baju;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class BajuController extends Controller
{
    public function index(): View
    {
    
       //get posts
       $bajus = Baju::latest()->paginate(5);

       //render view with posts
       return view('baju.index', compact('bajus'));
   }
   public function create(): View
   {
       return view('baju.create');
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
       $image->storeAs('public/baju', $image->hashName());

       //create sneakers
       Baju::create([
           'image'     => $image->hashName(),
           'nama_produk'     => $request->nama_produk,
           'harga'   => $request->harga,
           'stok'   => $request->stok,
           'deskripsi'   => $request->deskripsi,

       ]);

       //redirect to index
       return redirect()->route('baju.index')->with(['success' => 'Data Berhasil Disimpan!']);
   }
   public function edit(string $id): View
   {
       //get post by ID
       $bajus = Baju::findOrFail($id);

       //render view with post
       return view('baju.edit', compact('bajus'));
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
       $bajus = Baju::findOrFail($id);

       //check if image is uploaded
       if ($request->hasFile('image')) {

           //upload new image
           $image = $request->file('image');
           $image->storeAs('public/baju', $image->hashName());

           //delete old image
           Storage::delete('public/baju/'.$bajus->image);

           //update post with new image
           $bajus->update([
               'image'     => $image->hashName(),
               'nama_produk'     => $request->nama_produk,
               'harga'   => $request->harga,
               'stok'   => $request->stok,
               'deskripsi'   => $request->deskripsi
           ]);

       } else {

           //update post without image
           $bajus->update([
               'nama_produk'     => $request->nama_produk,
               'harga'   => $request->harga,
               'stok'   => $request->stok,
               'deskripsi'   => $request->deskripsi
           ]);
       }

       //redirect to index
       return redirect()->route('baju.index')->with(['success' => 'Data Berhasil Diubah!']);
   }
   public function destroy($id): RedirectResponse
   {
       //get post by ID
       $bajus = Baju::findOrFail($id);

       //delete image
       Storage::delete('public/baju/'. $bajus->image);

       //delete post
       $bajus->delete();

       //redirect to index
       return redirect()->route('baju.index')->with(['success' => 'Data Berhasil Dihapus!']);
   }
}
