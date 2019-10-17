<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanSparepart extends Model
{
    public function penjualan()
    {
        return $this->belongsTo('App\Penjualan', 'no_transaksi', 'no_transaksi');
    }

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'kode_sparepart', 'kode_sparepart');
    }

    public function kendaraan() {
        return $this->belongsTo('App\KendaraanCustomer', 'id_kendaraan', 'id_kendaraan');
    }

    protected $fillable = [
        'id_penjualan_sparepart', 'no_transaksi', 'kode_sparepart',
        'jumlah_penjualan_sparepart', 'subtotal_sparepart', 'id_kendaraan'
    ];

    protected $primaryKey = 'id_detail_penjualan_sparepart';
    public $incrementing = false; 
}
