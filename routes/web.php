<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SneakersController;
use App\Http\Controllers\AksesoriesController;
use App\Http\Controllers\TrousersController;
use App\Http\Controllers\ApparelController;
use App\Http\Controllers\PesanController;


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
// route untuk crud halaman utama dan search pada halaman apparel
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::get('/search', [PostController::class, 'cari'])->name('posts.cari');
// route untuk ke halaman sneakers dan search pada halaman sneakers 
Route::resource('/sneakers', \App\Http\Controllers\SneakersController::class);
Route::get('/search/sneakers', [SneakersController::class, 'cari'])->name('sneakers.cari');
// route untuk halaman crud aksesoris dan search pada halaman aksesoris
Route::resource('/aksesoris', \App\Http\Controllers\AksesoriesController::class);
Route::get('/search/aksesoris', [AksesoriesController::class, 'cari'])->name('aksesoris.cari');
// route untuk halaman crud Trousers dan search pada halaman Trouser
Route::resource('/trousers', \App\Http\Controllers\TrousersController::class);
Route::get('/search/trousers', [TrousersController::class, 'cari'])->name('trousers.cari');
//untuk menampilkan semua data apparel
// Route::get('/apparel', [App\Http\Controllers\ApparelController::class, 'index'])->name('apparel');
// untuk menuju pencarian atau pesan 
Route::get('/pesan/{id}',[PesanController::class,'index'])->name('pesan.index');
Route::get('/cekout/{id}',[PesanController::class,'pesan'])->name('pesan.pesan');


