<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Pegawai extends Authenticatable implements JWTSubject
{

    use Notifiable;

    public function cabangs()
    {
        return $this->belongsTo('App\Cabang', 'id_cabang', 'id_cabang');
    }

    public function kendaraan_customer()
    {
        return $this->hasMany('App\KendaraanCustomer', 'id_pegawai', 'id_pegawai');
    }

    public function penjualan()
    {
        return $this->belongsToMany('App\Penjualan', 'melayani', 'id_pegawai', 'no_transaksi');
    }

    protected $fillable = [
        'id_pegawai', 'id_cabang', 'nama_pegawai', 'alamat_pegawai', 'no_telp_pegawai', 'gaji_per_minggu',
        'jabatan_pegawai', 'username', 'password',
    ];

    public function setUsernameAttribute($value) {
        if (empty($value)) { 
            $this->attributes['username'] = NULL;
        } else {
            $this->attributes['username'] = $value;
        }
    }

    public function setPasswordAttribute($value) {
        if (empty($value)) { 
            $this->attributes['password'] = NULL;
        } else {
            $this->attributes['password'] = $value;
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $primaryKey = 'id_pegawai';
    public $incrementing = false;
}
