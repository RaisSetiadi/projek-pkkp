<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerhiasanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SneakersController;
use App\Http\Controllers\AksesoriesController;
use App\Http\Controllers\TrousersController;
use App\Http\Controllers\ApparelController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\PantsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/search/halamanutama', [HomeController::class, 'cari'])->name('layouts.cari');

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
//route untuk crud bagian tshirt
Route::resource('/baju', \App\Http\Controllers\bajuController::class);
//route untuk crud bagian celana 
Route::resource('/celana', \App\Http\Controllers\CelanaController::class);
//route untuk crud bagian kacamata
Route::resource('/kacamata', \App\Http\Controllers\KacamataController::class);
//route untuk crud bagian Topi
Route::resource('/topi', \App\Http\Controllers\TopiController::class);
// route untuk crud bagian makanan sehat pada halaman makanan
Route::resource('/MakananSehat', \App\Http\Controllers\MakanansehatController::class);
// route untuk crud bagian makanan sehat pada halaman makanan
Route::resource('/MinumanSehat', \App\Http\Controllers\MinumansehatController::class);
// route untuk crud halaman elektronik pada halaman user 
Route::resource('/Elektronik', \App\Http\Controllers\ElektronikController::class);
// route untuk crud halaman olahraga pada halaman user 
Route::resource('/olahraga', \App\Http\Controllers\OlahragaController::class);
// route untuk crud halaman otomotif pada halaman user 
Route::resource('/otomotif', \App\Http\Controllers\KendaraanController::class);


// route untuk crud halaman utama dan search pada halaman pakaian
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::get('/search', [PostController::class, 'cari'])->name('posts.cari');
// route untuk ke halaman sneakers dan search pada halaman sneakers 
Route::resource('/sneakers', \App\Http\Controllers\SneakersController::class);
Route::get('/search/sneakers', [SneakersController::class, 'cari'])->name('sneakers.cari');
// route untuk halaman crud aksesoris dan search pada halaman Barang Bekas 
Route::resource('/aksesoris', \App\Http\Controllers\AksesoriesController::class);
Route::get('/search/aksesoris', [AksesoriesController::class, 'cari'])->name('aksesoris.cari');
// route untuk halaman crud makanan dan search pada halaman Makanan
Route::resource('/trousers', \App\Http\Controllers\TrousersController::class);
Route::get('/search/trousers', [TrousersController::class, 'cari'])->name('trousers.cari');
// untuk menuju pencarian atau pesan 
Route::get('/pesan/{id}', [PesanController::class, 'index'])->name('pesan.index');
Route::post('/cekout/{id}', [PesanController::class, 'pesan'])->name('pesan.pesan');
Route::get('/checkout', [PesanController::class, 'checkout'])->name('pesan.checkout');
//route untuk halaman Pakaian 
Route::get('/halamanPakaian', [ApparelController::class, 'home'])->name('pakaian.home');
Route::get('/pesanPakaian/{id}', [PesanController::class, 'pakaian'])->name('pesan.pakaian');
Route::get('/pesanBaju/{id}', [PesanController::class, 'baju'])->name('pesan.baju');
Route::get('/pesanCelana/{id}', [PesanController::class, 'celana'])->name('pesan.celana');
// Route untuk  halaman sneakers
Route::get('/halamanSneakers', [SepatuController::class, 'index'])->name('sepatu.index');
Route::get('/pesanSneakers/{id}', [PesanController::class, 'sneakers'])->name('pesan.sneakers');
// Route::get('/showSepatu',[SepatuController::class,'show'])->name('sepatu.show');
// Route Untuk Halaman Barang Bekas
Route::get('/halamanBarangBekas', [PerhiasanController::class, 'index'])->name('userBarangbekas.index');
Route::get('/pesanBarangbekas/{id}', [PesanController::class, 'barangbekas'])->name('pesan.barangbekas');
Route::get('/pesanKacamata/{id}', [PesanController::class, 'kacamata'])->name('pesan.kacamata');
Route::get('/pesanTopi/{id}', [PesanController::class, 'topi'])->name('pesan.topi');
//route untuk halaman Makanan
Route::get('/halamanMakanan', [PantsController::class, 'index'])->name('userMakanan.index');
Route::get('/pesanMakanan/{id}', [PesanController::class, 'makanan'])->name('pesan.makanan');
Route::get('/DetailMakananBerat/{id}', [PantsController::class, 'makananberat'])->name('userMakanan.detailmakanan');
Route::get('/DetailMinuman/{id}', [PantsController::class, 'minuman'])->name('userMakanan.detailminuman');
