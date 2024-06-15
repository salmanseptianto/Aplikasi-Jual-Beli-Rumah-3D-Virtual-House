<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [HomeController::class, 'index']);


Route::controller(BlogController::class)->group(function () {
    Route::get('admin/blog', 'blog');
    Route::get('admin/tambahblog', 'tambahblog');
    Route::post('admin/simpanblog', 'simpanblog');
    Route::get('admin/ubahblog/{id}', 'ubahblog');
    Route::post('admin/updateblog/{id}', 'updateblog');
    Route::get('admin/hapusblog/{id}', 'hapusblog');

    Route::get('home/blog', 'blogs');
    Route::get('home/isiblog/{id}', 'isiblog');
});

Route::controller(AdminController::class)->group(function () {

    Route::get('admin', 'index');

    Route::get('admin/akun', 'akun');
    Route::post('admin/ubahakun/{id}', 'ubahakun');

    Route::get('admin/properti', 'properti');
    Route::get('admin/tambahproperti', 'tambahproperti');
    Route::post('admin/simpanproperti', 'simpanproperti');
    Route::get('admin/ubahproperti/{id}', 'ubahproperti');
    Route::post('admin/updateproperti/{id}', 'updateproperti');
    Route::get('admin/hapusproperti/{id}', 'hapusproperti');

    Route::get('admin/hapuspengguna/{id}', 'hapuspengguna');

    Route::get('admin/pengguna', 'pengguna');
    Route::get('admin/tambahpengguna', 'tambahpengguna');
    Route::post('admin/simpanpengguna', 'simpanpengguna');
    Route::get('admin/ubahpengguna/{id}', 'ubahpengguna');
    Route::post('admin/updatepengguna/{id}', 'updatepengguna');
    Route::get('admin/hapuspengguna/{id}', 'hapuspengguna');

    Route::get('admin/logout', 'logout');

    Route::get('admin/pembelian', 'pembelian');
    Route::get('admin/pembayaran/{id}', 'pembayaran');
    Route::post('admin/simpanpembayaran/{id}', 'simpanpembayaran');
    Route::post('admin/selesai', 'selesai');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/properti/search', 'cari')->name('properti.search');
    Route::get('home', 'index')->name('home');
    Route::get('home/properti', 'properti');
    Route::get('home/detail/{id}', 'detail');


    Route::get('home/login', 'login')->name('login');
    Route::post('home/dologin', 'dologin');
    Route::get('home/daftar', 'daftar');
    Route::post('home/dodaftar', 'dodaftar');

    Route::get('home/akun', 'akun');
    Route::post('home/ubahakun/{id}', 'ubahakun');

    Route::get('home/keranjang', 'keranjang');
    Route::get('home/hapuskeranjang/{id}', 'hapuskeranjang');
    Route::get('home/checkout', 'checkout');
    Route::post('home/docheckout', 'docheckout');
    Route::get('home/riwayat', 'riwayat');
    Route::get('home/logout', 'logout');

    Route::post('home/pesan', 'pesan');
    Route::get('home/pembayaran/{id}', 'pembayaran');
    Route::post('home/pembayaransimpan', 'pembayaransimpan');
    Route::post('home/selesai', 'selesai');
});

Route::controller(PasswordController::class)->group(function () {
    Route::get('auth/remember', 'index');
    Route::post('/auth/verify', 'verify')->name('email.verify');
    Route::get('/auth/ubahsandi/{token}', 'ubahsandi')->name('password.ubahsandi');
    Route::post('/auth/update', 'update')->name('password.update');
});
