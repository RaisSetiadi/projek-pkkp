<?php

namespace App\Http\Controllers;

// import model sneakers
use App\Models\Sneakers;
use Illuminate\Http\Request;
//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;


class SneakersController extends Controller
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
        $sneaker = Sneakers::latest()->paginate(5);

        //render view with posts
        return view('sneakers.index', compact('sneaker'));
    }
    public function create(): View
    {
        return view('sneakers.create');
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
        $image->storeAs('public/sneakers', $image->hashName());

        //create sneakers
        Sneakers::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('sneakers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
     /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $sneaker = Sneakers::findOrFail($id);

        //render view with post
        return view('sneakers.show', compact('sneaker'));
    }
    public function edit(string $id): View
    {
        //get post by ID
        $sneaker = Sneakers::findOrFail($id);

        //render view with post
        return view('sneakers.edit', compact('sneaker'));
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
        $sneaker = Sneakers::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/sneakers', $image->hashName());

            //delete old image
            Storage::delete('public/sneakers/'.$sneaker->image);

            //update post with new image
            $sneaker->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $sneaker->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('sneakers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $sneaker = Sneakers::findOrFail($id);

        //delete image
        Storage::delete('public/sneakers/'. $sneaker->image);

        //delete post
        $sneaker->delete();

        //redirect to index
        return redirect()->route('sneakers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        // mengambil data dari table pegawai sesuai pencarian data
        $sneaker = Sneakers::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);


        // mengirim data pegawai ke view index
        return view('sneakers.index', compact('sneaker'));
    }
}


