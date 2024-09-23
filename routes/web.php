<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatakostController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Mobile\HomeMobileController;
use App\Http\Controllers\Mobile\LoginMobileController;
use App\Http\Controllers\Mobile\BookingMobileController;
use App\Http\Controllers\Mobile\PembayaranMobileController;
use App\Http\Controllers\Mobile\RegistrasiMobileController;

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
    if (auth()->user()) {
        return redirect('dashboard');
    }
    return redirect('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('proses.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// PENDAFTARAN
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/pendaftaran/{level}', [PendaftaranController::class, 'search'])->name('cari.pendaftaran');
Route::get('/pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])->name('edit.pendaftaran');
Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('update.pendaftaran');
Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('destroy.pendaftaran');

// REGISTRASI
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('proses.pendaftaran');

// DATA KOST
Route::get('/data-kost', [DatakostController::class, 'index'])->name('datakost');
Route::get('/data-kost/create', [DatakostController::class, 'create'])->name('datakost.create');
Route::post('/data-kost', [DatakostController::class, 'store'])->name('datakost.store');
Route::get('/data-kost/{id}/edit', [DatakostController::class, 'edit'])->name('datakost.edit');
Route::put('/data-kost/{id}', [DatakostController::class, 'update'])->name('datakost.update');
Route::delete('/data-kost/{id}', [DatakostController::class, 'destroy'])->name('datakost.destroy');

// BOOKING
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');
Route::post('/booking/batal/{id}', [BookingController::class, 'batal'])->name('booking.batal');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

// TRANSAKSI
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::get('/transaksi/cetak', [TransaksiController::class, 'cetak_pdf'])->name('cetak.transaksi');

// REKENING
Route::get('/rekening', [RekeningController::class, 'index'])->name('rekening');
Route::get('/rekening/create', [RekeningController::class, 'create'])->name('rekening.create');
Route::post('/rekening', [RekeningController::class, 'store'])->name('rekening.store');
Route::get('/rekening/{id}/edit', [RekeningController::class, 'edit'])->name('rekening.edit');
Route::put('/rekening/{id}', [RekeningController::class, 'update'])->name('rekening.update');
Route::delete('/rekening/{id}', [RekeningController::class, 'destroy'])->name('rekening.destroy');

// PENGGUNA
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('create.pengguna');
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('store.pengguna');
Route::get('/pengguna/{level}', [PenggunaController::class, 'search'])->name('cari.pengguna');
Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('edit.pengguna');
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('update.pengguna');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('destroy.pengguna');

//SETTING
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::put('/setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');

//PROFIL
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
Route::post('/profil/ajax', [ProfilController::class, 'ajax_avatar'])->name('ajax.upload.profil');


// TAMPILAN MOBILE
Route::get('/mobile/login', [LoginMobileController::class, 'index'])->name('mobile.login');
Route::post('/mobile/login', [LoginMobileController::class, 'proses'])->name('mobile.proses.login');
Route::get('/mobile/otp-login', [LoginMobileController::class, 'otp_login'])->name('proses.login.otp');
Route::post('/mobile/proses-otp-login', [LoginMobileController::class, 'proses_otp_login'])->name('mobile.login.otp');
Route::get('/mobile/logout', [LoginMobileController::class, 'logout'])->name('mobile.logout');

Route::get('/mobile/index', function () {
    return redirect('/mobile/dashboard');
});
Route::get('/mobile/dashboard', [HomeMobileController::class, 'index'])->name('mobile.home');
Route::get('/mobile/cari', [HomeMobileController::class, 'cari'])->name('mobile.cari');
Route::get('/mobile/detail/{id}', [HomeMobileController::class, 'show'])->name('mobile.detail');
Route::get('/mobile/booking/{id}/{harga}', [BookingMobileController::class, 'show'])->name('mobile.booking');
Route::post('/mobile/booking/', [BookingMobileController::class, 'store'])->name('mobile.store');
Route::post('/mobile/booking/getajax', [BookingMobileController::class, 'ajaxrekening'])->name('mobile.ajaxrekening');
Route::get('/mobile/pembayaran/{id}', [PembayaranMobileController::class, 'show'])->name('mobile.pembayaran.show');
Route::put('/mobile/pembayaran/update/{id}', [PembayaranMobileController::class, 'konfirmasi'])->name('mobile.pembayaran.konfirmasi');
Route::get('/mobile/konfirmasi_pembayaran', [PembayaranMobileController::class, 'pesan_konfirmasi'])->name('mobile.pembayaran.pesan_konfirmasi');

// REGISTRASI
Route::get('/mobile/registrasi', [RegistrasiMobileController::class, 'create'])->name('mobile.registrasi.create');
Route::post('/mobile/registrasi', [RegistrasiMobileController::class, 'store'])->name('mobile.registrasi.store');