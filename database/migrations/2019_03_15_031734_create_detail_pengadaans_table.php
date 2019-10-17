<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengadaans', function (Blueprint $table) {
            $table->string('id_detail_pengadaan', 20)->primary();
            $table->string('id_pengadaan', 20);
            $table->string('kode_sparepart', 20);
            $table->integer('jumlah');
            $table->float('harga_beli', 11, 2);
            $table->float('subtotal_pengadaan', 11, 2);
            $table->string('satuan', 20);
            $table->timestamps();

            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('pengadaans')->onDelete('cascade');
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
        Schema::dropIfExists('detail_pengadaans');
    }
}
