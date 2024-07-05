<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriServiceController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PembukuanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

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
    return view('landing');
});
Route::get('/test', function () {
    return view('laporan/pdf');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Barang
Route::resource('barang', BarangController::class);

// Route Kategori
Route::resource('kategori', KategoriServiceController::class);

// Route Profile
Route::resource('profile', ProfileController::class);

// Route User
Route::resource('user', UserController::class);

// Route Servis
Route::resource('servis', ServisController::class);
Route::post('/servis/update-status/{id}', [ServisController::class, 'updateStatus'])->name('servis.updateStatus'); //update status
Route::get('/servis/form/{id}', [FrontendController::class, 'showServiceForm'])->name('servis.form');


// Frontend
Route::get('/home', [FrontendController::class, 'index'])->name('home');

// Route Laporan
Route::resource('akun', AkunController::class);
Route::resource('laporan', PembukuanController::class);
Route::get('/laporan/pdf', [LaporanController::class, 'generatePDF'])->name('laporan.pdf');