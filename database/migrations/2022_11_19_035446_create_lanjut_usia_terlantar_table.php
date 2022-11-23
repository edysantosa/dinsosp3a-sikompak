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
        Schema::create('lanjut_usia_terlantar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan_keluarga')->nullable();
            $table->unsignedBigInteger('lembaga_kesejahteraan_sosial_id');
            $table->foreign('lembaga_kesejahteraan_sosial_id')->references('id')->on('lembaga_kesejahteraan_sosial')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('lanjut_usia_terlantar_id')->nullable();
            $table->foreign('lanjut_usia_terlantar_id')->references('id')->on('lanjut_usia_terlantar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pmks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('lanjut_usia_terlantar_id');
        });

        Schema::dropIfExists('lanjut_usia_terlantar');
    }
};
