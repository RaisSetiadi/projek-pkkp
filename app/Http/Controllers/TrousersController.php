<?php

namespace App\Http\Controllers;
use App\Models\Trousers;

//return type View
use Illuminate\View\View;
use Illuminate\Http\Request;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;


class TrousersController extends Controller
{
     //
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get Trousers
        $trouser = Trousers::latest()->paginate(5);

        //render view with Trousers
        return view('trousers.index', compact('trouser'));
    }
    public function create(): View
    {
        return view('trousers.create');
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
        $image->storeAs('public/trousers', $image->hashName());

        //create sneakers
        Trousers::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('trousers.index')->with(['success' => 'Data Berhasil Disimpan!']);
}
public function show(string $id): View
{
    //get post by ID
    $trouser = Trousers::findOrFail($id);

    //render view with post
    return view('trousers.show', compact('trouser'));
}
public function edit(string $id): View
    {
        //get post by ID
        $trouser = trousers::findOrFail($id);

        //render view with post
        return view('trousers.edit', compact('trouser'));
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
        $trouser = Trousers::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/trousers', $image->hashName());

            //delete old image
            Storage::delete('public/trousers/'.$trouser->image);

            //update post with new image
            $trouser->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $trouser->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('trousers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        // mengambil data dari table pegawai sesuai pencarian data
        $trouser = Trousers::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);


        // mengirim data pegawai ke view index
        return view('trousers.index', compact('trouser'));
    }
    
}