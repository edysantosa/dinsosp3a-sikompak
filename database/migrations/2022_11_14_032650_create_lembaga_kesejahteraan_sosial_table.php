<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembaga_kesejahteraan_sosial', function (Blueprint $table) {
            $table->id();
            $table->string('nama');

            $table->string('provinsi_id', 13);
            $table->foreign('provinsi_id')->references('id')->on('provinsi')->onDelete('restrict');
            $table->string('kabupaten_kota_id', 13);
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupaten_kota')->onDelete('restrict');
            $table->string('kecamatan_id', 13);
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('restrict');
            $table->string('kelurahan_id', 13);
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onDelete('restrict');
            $table->string('alamat')->nullable();

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
        Schema::dropIfExists('lembaga_kesejahteraan_sosial');
    }
};
