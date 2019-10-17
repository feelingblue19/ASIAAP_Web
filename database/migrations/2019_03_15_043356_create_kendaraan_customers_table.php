<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraanCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_customers', function (Blueprint $table) {
            $table->string('id_kendaraan', 20)->primary();
            $table->string('id_tipe', 20);
            $table->string('no_polisi', 20);
            $table->string('id_pegawai', 20);
            $table->timestamps();

            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_kendaraans')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan_customers');
    }
}
