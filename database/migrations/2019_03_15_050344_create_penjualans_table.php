<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->string('no_transaksi', 20)->primary();
            $table->dateTime('tanggal_transaksi');
            $table->float('subtotal_transaksi', 11, 2)->default(0);
            $table->float('diskon_transaksi', 11, 2)->default(0);
            $table->float('total_transaksi', 11, 2)->default(0);
            $table->string('nama_customer', 50);
            $table->string('no_telp_customer', 12);
            $table->string('status_transaksi', 20);
            $table->string('keterangan_transaksi', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
