<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    public function sparepart()
    {
        return $this->belongsTo('App\Sparepart', 'kode_sparepart', 'kode_sparepart');
    }

    protected $fillable = [
        'id_histori', 'tanggal_histori', 'jumlah_histori', 'kode_sparepart',
        'keterangan_histori', 'sisa_stok'
    ];

    protected $hidden = [
        'sisa_stok'
    ];

    protected $primaryKey = 'id_histori';
    public $incrementing = false;
    public $timestamps = false;

}
