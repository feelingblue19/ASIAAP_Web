<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historis', function (Blueprint $table) {
            $table->string('id_histori', 20)->primary();
            $table->dateTime('tanggal_histori');
            $table->string('kode_sparepart', 20);
            $table->integer('jumlah_histori');
            $table->string('keterangan_histori', 20);
            $table->integer('sisa_stok');

            $table->foreign('kode_sparepart')->references('kode_sparepart')->on('spareparts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historis');
    }
}
