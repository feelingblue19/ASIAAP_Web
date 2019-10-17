<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkKendaraan extends Model
{

    public function tipe_kendaraans()
    {
        return $this->hasMany('App\TipeKendaraan', 'id_merk', 'id_merk');
    }

    protected $fillable = [
        'id_merk', 'nama_merk'
    ];

    protected $primaryKey = 'id_merk';
    public $incrementing = false;
}
