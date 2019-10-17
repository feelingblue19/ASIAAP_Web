<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    public function pengadaan()
    {
        return $this->hasMany('App\Pengadaan', 'id_supplier', 'id_supplier');
    }

    protected $fillable = [
        'id_supplier', 'nama_supplier', 'alamat_supplier', 'no_telp_supplier',
        'nama_sales', 'no_telp_sales'
    ];

    protected $primaryKey = 'id_supplier';
    public $incrementing = false;
}
