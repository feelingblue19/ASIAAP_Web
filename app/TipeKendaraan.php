<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKendaraan extends Model
{
    public function sparepart()
    {
        return $this->belongsToMany('App\Sparepart', 'kecocokan', 'id_tipe', 'kode_sparepart');
    }

    public function merk_kendaraan()
    {
        return $this->belongsTo('App\MerkKendaraan', 'id_merk', 'id_merk');
    }

    public function kendaraan_customer()
    {
        return $this->hasMany('App\KendaraanCustomer', 'id_tipe', 'id_tipe');
    }

    protected $fillable = [
        'id_tipe', 'id_merk', 'nama_tipe'
    ];

    protected $primaryKey = 'id_tipe';
    public $incrementing = false;
}
