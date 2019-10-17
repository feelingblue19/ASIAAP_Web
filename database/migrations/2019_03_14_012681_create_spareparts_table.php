<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->string('kode_sparepart', 20)->primary();
            $table->string('penempatan_sparepart', 20)->unique();
            $table->string('tipe_sparepart', 50);
            $table->string('nama_sparepart', 50);
            $table->float('harga_jual_sparepart', 11, 2);
            $table->float('harga_beli_sparepart', 11, 2);
            $table->string('merk_sparepart', 50);
            $table->integer('stok_sparepart');
            $table->integer('min_stok');
            $table->string('gambar_sparepart',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
