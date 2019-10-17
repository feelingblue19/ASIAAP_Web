<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kendaraans', function (Blueprint $table) {
            $table->string('id_tipe', 20)->primary();
            $table->string('id_merk', 20);
            $table->string('nama_tipe', 50);
            $table->timestamps();

            $table->foreign('id_merk')->references('id_merk')->on('merk_kendaraans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_kendaraans');
    }
}
