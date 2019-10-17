<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{

    public function pegawais()
    {
        return $this->hasMany('App\Pegawai', 'id_cabang', 'id_cabang');
    }

    protected $fillable = [
        'id_cabang', 'nama_cabang', 'alamat_cabang'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $primaryKey = 'id_cabang';
    public $incrementing = false;
}
