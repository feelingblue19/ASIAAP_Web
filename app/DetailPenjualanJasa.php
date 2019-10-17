<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanJasa extends Model
{

    public function penjualan()
    {
        return $this->belongsTo('App\Penjualan', 'no_transaksi', 'no_transaksi');
    }

    public function jasa_service()
    {
        return $this->belongsTo('App\JasaService', 'id_jasa_service', 'id_jasa_service');
    }

    public function kendaraan() {
        return $this->belongsTo('App\KendaraanCustomer', 'id_kendaraan', 'id_kendaraan');
    }

    protected $fillable = [
        'id_penjualan_jasa', 'no_transaksi', 'id_jasa_service', 
        'id_kendaraan', 'jumlah_penjualan_jasa', 'subtotal_jasa',
    ];

    protected $primaryKey = 'id_penjualan_jasa';
    public $incrementing = false;



}
