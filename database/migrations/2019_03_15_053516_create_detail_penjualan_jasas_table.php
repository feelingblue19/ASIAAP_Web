<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenjualanJasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan_jasas', function (Blueprint $table) {
            $table->string('id_penjualan_jasa', 20)->primary();
            $table->string('no_transaksi', 20);
            $table->string('id_jasa_service', 20);
            $table->string('id_kendaraan', 20);
            $table->integer('jumlah_penjualan_jasa');
            $table->float('subtotal_jasa', 11, 2);
            $table->timestamps();

            $table->foreign('no_transaksi')->references('no_transaksi')->on('penjualans')->onDelete('cascade');
            $table->foreign('id_jasa_service')->references('id_jasa_service')->on('jasa_services')->onDelete('cascade');
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('kendaraan_customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan_jasas');
    }
}
