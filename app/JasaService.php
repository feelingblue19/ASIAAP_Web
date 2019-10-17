<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasaService extends Model
{
    protected $fillable = [
        'id_jasa_service', 'nama_jasa_service', 'harga_jasa_service'
    ];

    protected $primaryKey = 'id_jasa_service';
    public $incrementing = false;
}
