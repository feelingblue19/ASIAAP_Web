<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenjualanSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan_spareparts', function (Blueprint $table) {
            $table->string('id_penjualan_sparepart', 20)->primary();
            $table->string('no_transaksi', 20);
            $table->string('kode_sparepart', 20);
            $table->string('id_kendaraan', 20)->nullable();
            $table->integer('jumlah_penjualan_sparepart');
            $table->float('subtotal_sparepart', 11, 2);
            $table->timestamps();

            $table->foreign('no_transaksi')->references('no_transaksi')->on('penjualans')->onDelete('cascade');
            $table->foreign('kode_sparepart')->references('kode_sparepart')->on('spareparts')->onDelete('cascade');
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
        Schema::dropIfExists('detail_penjualan_spareparts');
    }
}
