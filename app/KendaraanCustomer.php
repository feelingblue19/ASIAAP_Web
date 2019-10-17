<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KendaraanCustomer extends Model
{
    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'id_pegawai', 'id_pegawai');
    }

    public function tipe_kendaraan()
    {
        return $this->belongsTo('App\TipeKendaraan', 'id_tipe', 'id_tipe');
    }

    public function detail_penjualan_jasa()
    {
        return $this->hasMany('App\DetailPenjualanJasa', 'id_kendaraan', 'id_kendaraan');
    }

    public function detail_penjualan_sparepart()
    {
        return $this->hasMany('App\DetailPenjualanSparepart', 'id_kendaraan', 'id_kendaraan');
    }

    

    protected $fillable = [
        'id_kendaraan', 'id_tipe', 'no_polisi', 'id_pegawai'
    ];

    protected $primaryKey = 'id_kendaraan';
    public $incrementing = false;
}
