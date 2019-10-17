<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function pegawai()
    {
        return $this->belongsToMany('App\Pegawai', 'melayani', 'no_transaksi', 'id_pegawai');
    }

    public function detail_penjualan_jasa()
    {
        return $this->hasMany('App\DetailPenjualanJasa', 'no_transaksi', 'no_transaksi');
    }

    public function detail_penjualan_sparepart()
    {
        return $this->hasMany('App\DetailPenjualanSparepart', 'no_transaksi', 'no_transaksi');
    }

    protected $fillable = [
        'no_transaksi', 'tanggal_transaksi', 'subtotal_transaksi',
        'diskon_transaksi', 'total_transaksi', 'nama_customer',
        'no_telp_customer', 'status_transaksi', 'keterangan_transaksi'
    ];

    protected $primaryKey = 'no_transaksi';
    public $incrementing = false;
    public $timestamps = false;

}
