<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipeKendaraan;

class Sparepart extends Model
{
    public function tipe_kendaraan()
    {
        return $this->belongsToMany('App\TipeKendaraan', 'kecocokan', 'kode_sparepart', 'id_tipe');
    }

    public function detail_pengadaan()
    {
        return $this->hasMany('App\DetailPengadaan', 'kode_sparepart', 'kode_sparepart');
    }

    public function histori()
    {
        return $this->hasMany('App\Histori', 'kode_sparepart', 'kode_sparepart');
    }

    protected $fillable = [
        'kode_sparepart', 'penempatan_sparepart', 'tipe_sparepart', 'nama_sparepart', 
        'harga_jual_sparepart', 'harga_beli_sparepart', 'merk_sparepart',
        'stok_sparepart', 'min_stok', 'gambar_sparepart'
    ];

    protected $primaryKey = 'kode_sparepart';
    public $incrementing = false;
}
