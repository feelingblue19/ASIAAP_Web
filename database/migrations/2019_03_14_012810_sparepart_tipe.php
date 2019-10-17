<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SparepartTipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecocokan', function (Blueprint $table) {
            $table->string('kode_sparepart', 20);
            $table->string('id_tipe', 20);
            $table->primary(['kode_sparepart', 'id_tipe']);
            $table->foreign('kode_sparepart')->references('kode_sparepart')->on('spareparts')->onDelete('cascade');
            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_kendaraans')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
