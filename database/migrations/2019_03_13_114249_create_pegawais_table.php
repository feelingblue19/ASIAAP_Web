<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('id_pegawai', 20)->primary();
            $table->string('id_cabang',20);
            $table->string('nama_pegawai',50);
            $table->string('alamat_pegawai',50);
            $table->string('no_telp_pegawai',12);
            $table->float('gaji_per_minggu',11,2);
            $table->string('jabatan_pegawai',20);
            $table->string('username',10)->nullable()->unique();
            $table->string('password',255)->nullable();
            $table->timestamps();

            $table->foreign('id_cabang')->references('id_cabang')->on('cabangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
