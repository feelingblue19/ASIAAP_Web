<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier', 'id_supplier');
    }

    public function detail_pengadaan()
    {
        return $this->hasMany('App\DetailPengadaan', 'id_pengadaan', 'id_pengadaan');
    }

    protected $fillable = [
        'id_pengadaan', 'id_supplier', 'tanggal_pengadaan', 'status',
        'total_pengadaan'
    ];

    protected $primaryKey = 'id_pengadaan';
    public $incrementing = false;
    public $timestamps = false;
}
