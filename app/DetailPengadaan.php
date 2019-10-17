<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengadaan extends Model
{

    public function pengadaan()
    {
        return $this->belongsTo('App\Pengadaan', 'id_pengadaan', 'id_pengadaan');
    }

    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'kode_sparepart', 'kode_sparepart');
    }

    protected $fillable = [
        'id_detail_pengadaan', 'id_pengadaan', 'kode_sparepart', 'jumlah',
        'harga_beli', 'subtotal_pengadaan', 'satuan'
    ];

    protected $primaryKey = 'id_detail_pengadaan';
    public $incrementing = false;
}
