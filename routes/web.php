<?php

use Illuminate\View\View;

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

// Admin Page //////////////////////////
Route::get('/admin', function () {
    return view('homeOwner');
});

Route::get('/pegawai', function () {
    return view('formPegawai');
});

Route::get('/cabang', function () {
    return view('formCabang');
});

Route::get('/merk', function () {
    return view('formDataMerk');
});

Route::get('/tipe', function () {
    return view('formTipeKendaraan');
});

Route::get('/supplier', function () {
    return view('formSupplier');
});

Route::get('/sparepart', function () {
    return view('formSparepart');
});

Route::get('/histori', function () {
    return view('historiSpareparts');
});

Route::get('/pengadaan', function () {
    return view('formPengadaanSparepart');
});

Route::get('/service', function () {
    return view('formDataService');
});

Route::get('/laporan', function () {
    return view('formLaporan');
});
// ////////////////////////////////////////

// Employees Page
Route::get('/loginAA2019', function () {
    return view('login');
});

Route::get('/penjualan', function () {
    return view('formTransaksiPenjualan');
});

Route::get('/tampilpenjualan', function () {
    return view('tampilPenjualan');
});

Route::get('/pembayaran', function () {
    return view('formTransaksiPembayaran');
});
//////////////////////////////////////////

// Public Page //////////////////
Route::get('/', function () {
    return view('homeCustomer');
});

Route::get('/katalog', function () {
    return view('katalogcustomer');
});

Route::get('/contact', function () {
    return view('contactcustomer');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/caritransaksi', function () {
    return view('cariTransaksiCustomer');
});
////////////////////////////////

Route::get('/pengeluaran_bulanan', function () {
    return view('pengeluaranbulanan');
});


Route::get('/pendapatan_bulanan', function () {
    return view('pendapatanbulanan');
});

Route::get('/sparepart_terlaris', function () {
    return view('sparepartterlaris');
});

Route::get('/sisa_stok', function () {
    return view('laporansisastok');
});

Route::get('/penjualan_jasa', function () {
    return view('penjualanjasa');
});

Route::get('/pendapatan_tahunan', function () {
    return view('pendapatantahunan');
});

///////////////////////////////////////////////
Route::get('/nota_spk', function () {
    return view('notaSPK');
});

Route::get('/nota_lunas', function () {
    return view('notaLunas');
});

Route::get('/nota_pengadaan', function () {
    return view('notapengadaan');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});




















