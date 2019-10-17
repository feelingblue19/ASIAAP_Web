<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => ['cors']], function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthController@login');
        Route::get('refresh', 'AuthController@refresh');
        Route::group(['middleware' => 'auth:api'], function(){
            Route::post('logout', 'AuthController@logout');
        });
    });
    
    Route::group(['middleware' => ['auth:api']], function () {
        Route::group(['prefix' => 'pegawai'], function () {
            Route::post('tambah', 'PegawaiController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'PegawaiController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'PegawaiController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'PegawaiController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'PegawaiController@show')->middleware('isAdminorSelf');
            Route::get('tampil_montir/', 'PegawaiController@showMontir')->middleware('isCustomerService');
        });
    
        Route::group(['prefix' => 'cabang'], function () {
            Route::post('tambah', 'CabangController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'CabangController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'CabangController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'CabangController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'CabangController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'tipekendaraan'], function () {
            Route::post('tambah', 'TipeKendaraanController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'TipeKendaraanController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'TipeKendaraanController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'TipeKendaraanController@index')->middleware('isAdminorCS');
            Route::get('cari/{id}', 'TipeKendaraanController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'merkkendaraan'], function () {
            Route::post('tambah', 'MerkKendaraanController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'MerkKendaraanController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'MerkKendaraanController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'MerkKendaraanController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'MerkKendaraanController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'supplier'], function () {
            Route::post('tambah', 'SupplierController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'SupplierController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'SupplierController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'SupplierController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'SupplierController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'jasaservice'], function () {
            Route::post('tambah', 'JasaServiceController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'JasaServiceController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'JasaServiceController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'JasaServiceController@index')->middleware('isAdminorCS');
            Route::get('cari/{id}', 'JasaServiceController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'sparepart'], function () {
            Route::post('tambah', 'SparepartController@store')->middleware('isAdmin');
            Route::post('ubah/{id}', 'SparepartController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'SparepartController@destroy')->middleware('isAdmin');
            Route::get('cari/{id}', 'SparepartController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'pengadaan'], function () {
            Route::post('tambah', 'PengadaanController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'PengadaanController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'PengadaanController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'PengadaanController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'PengadaanController@show')->middleware('isAdmin');
            Route::put('selesai/{id}', 'PengadaanController@selesai')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'detailpengadaan'], function () {
            Route::post('tambah', 'DetailPengadaanController@store')->middleware('isAdmin');
            Route::put('ubah/{id}', 'DetailPengadaanController@update')->middleware('isAdmin');
            Route::delete('hapus/{id}', 'DetailPengadaanController@destroy')->middleware('isAdmin');
            Route::get('tampil', 'DetailPengadaanController@index')->middleware('isAdmin');
            Route::get('cari/{id}', 'DetailPengadaanController@show')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'histori'], function () {
            Route::post('tambah', 'HistoriController@store')->middleware('isAdminorKasir');
            Route::get('tampil', 'HistoriController@index')->middleware('isAdmin');
        });
    
        Route::group(['prefix' => 'kendaraancustomer'], function () {
            Route::post('tambah', 'KendaraanCustomerController@store')->middleware('isCustomerService');
            Route::get('cari/{id}', 'KendaraanCustomerController@show');
            Route::get('tampil', 'KendaraanCustomerController@index');
            Route::get('cari_kendaraan/{id}', 'KendaraanCustomerController@cari_kendaraan')->middleware('isCustomerService');
        });
    
        Route::group(['prefix' => 'penjualan'], function () {
            Route::post('tambah', 'PenjualanController@store')->middleware('isCustomerService');
            Route::put('ubah/{id}', 'PenjualanController@update')->middleware('isCustomerService');
            Route::put('selesai/{id}', 'PenjualanController@selesai')->middleware('isCustomerService');
            Route::delete('hapus/{id}', 'PenjualanController@destroy')->middleware('isCustomerService');
            Route::get('tampil', 'PenjualanController@index');
            Route::get('cari/{id}', 'PenjualanController@show');
            Route::put('bayar/{id}', 'PenjualanController@bayar')->middleware('isKasir');
        });

        Route::group(['prefix' => 'penjualanjasa'], function () {
            Route::post('tambah', 'DetailPenjualanJasaController@store')->middleware('isCustomerService');
            Route::get('tampil', 'DetailPenjualanJasaController@index')->middleware('isCustomerService');
            Route::get('cari/{id}', 'DetailPenjualanJasaController@show');//->middleware('isCustomerService');
        });

        Route::group(['prefix' => 'penjualansparepart'], function () {
            Route::post('tambah', 'DetailPenjualanSparepartController@store')->middleware('isCustomerService');
            Route::get('tampil', 'DetailPenjualanSparepartController@index')->middleware('isCustomerService');
            Route::get('cari/{id}', 'DetailPenjualanSparepartController@show');//->middleware('isCustomerService');
        });
    
    });
    
    // buat test
    Route::post('tambah', 'PegawaiController@store');
    Route::post('tambahcabang', 'CabangController@store');
    ////////////////////////////////////////////////////////
    
    Route::get('sparepart/tampil', 'SparepartController@index');
    Route::get('penjualan/tampilriwayat', 'PenjualanController@tampilRiwayat');
    Route::get('penjualan/tampilmontir/{id}', 'PenjualanController@getMontir');

    //LAPORAN CONTROLLER

    Route::get('pengeluaranbulanan/{tahun}', 'LaporanController@pengeluaranBulanan');
    Route::get('penjualanjasa/{bulan}/{tahun}', 'LaporanController@penjualanJasa');
    Route::get('pendapatanbulanan/{tahun}', 'LaporanController@pendapatanBulanan');
    Route::get('sparepartterlaris/{tahun}', 'LaporanController@sparepartTerlaris');
    Route::get('sisastok/{barang}/{tahun}', 'LaporanController@sisaStok');
    Route::get('pendapatantahunan', 'LaporanController@pendapatanTahunan');
    


    //NOTA CONTROLLER
    Route::get('getpenjualan/{id}', 'NotaController@getPenjualan');
    Route::get('getdetailpenjualanjasa/{id}/{kendaraan}', 'NotaController@getDetailPenjualanJasa');
    Route::get('getpenjualansprsatu/{id}/{kendaraan}', 'NotaController@getDetailPenjualanSprSatu');
    Route::get('getdetailpenjualansparepart/{id}', 'NotaController@getDetailPenjualanSparepart');
    Route::get('getkendaraan/{id}', 'NotaController@getKendaraan');
    Route::get('getsatukendaraan/{id}', 'NotaController@getSatuKendaraan');
    Route::get('getjasapertrans/{id}', 'NotaController@getPenjualanJasaperTrans');
    Route::get('getpengadaan/{id}', 'PengadaanController@show');
    Route::get('getdetailpengadaan/{id}', 'DetailPengadaanController@show');

    Route::get('sparepart/gettipe', 'SparepartController@getTipe');

    
    


});








