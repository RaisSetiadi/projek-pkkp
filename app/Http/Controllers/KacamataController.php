<?php

namespace App\Http\Controllers;

use App\Models\Kacamata;
use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;


use function PHPUnit\Framework\returnSelf;

class KacamataController extends Controller
{
    //
    public function index(): View
    {
        $kacamatas= Kacamata::paginate(5);
        return view('kacamata.index',compact('kacamatas'));
    }
    public function create(): View
    {
        return view('kacamata.create');
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
        $image->storeAs('public/kacamata', $image->hashName());
 
        //create sneakers
        Kacamata::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,
 
        ]);
 
        //redirect to index
        return redirect()->route('kacamata.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
   {
       //get post by ID
       $kacamatas = Kacamata::findOrFail($id);

       //render view with post
       return view('kacamata.edit', compact('kacamatas'));
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
       $kacamatas = Kacamata::findOrFail($id);

       //check if image is uploaded
       if ($request->hasFile('image')) {

           //upload new image
           $image = $request->file('image');
           $image->storeAs('public/kacamata', $image->hashName());

           //delete old image
           Storage::delete('public/kacamata/'.$kacamatas->image);

           //update post with new image
           $kacamatas->update([
               'image'     => $image->hashName(),
               'nama_produk'     => $request->nama_produk,
               'harga'   => $request->harga,
               'stok'   => $request->stok,
               'deskripsi'   => $request->deskripsi
           ]);

       } else {

           //update post without image
           $kacamatas->update([
               'nama_produk'     => $request->nama_produk,
               'harga'   => $request->harga,
               'stok'   => $request->stok,
               'deskripsi'   => $request->deskripsi
           ]);
       }

       //redirect to index
       return redirect()->route('kacamata.index')->with(['success' => 'Data Berhasil Diubah!']);
   }
   public function destroy($id): RedirectResponse
   {
       //get post by ID
       $kacamatas = Kacamata::findOrFail($id);

       //delete image
       Storage::delete('public/kacamata/'. $kacamatas->image);

       //delete post
       $kacamatas->delete();

       //redirect to index
       return redirect()->route('kacamata.index')->with(['success' => 'Data Berhasil Dihapus!']);
   }
}

