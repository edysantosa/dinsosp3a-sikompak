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
        Schema::create('anak_korban_kekerasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan_keluarga')->nullable();

            $table->unsignedBigInteger('lembaga_kesejahteraan_sosial_id')->nullable();
            $table->foreign('lembaga_kesejahteraan_sosial_id')->references('id')->on('lembaga_kesejahteraan_sosial')->onDelete('cascade');

            $table->unsignedBigInteger('jenis_kekerasan_id');
            $table->foreign('jenis_kekerasan_id')->references('id')->on('jenis_kekerasan')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('anak_korban_kekerasan_id')->nullable();
            $table->foreign('anak_korban_kekerasan_id')->references('id')->on('anak_korban_kekerasan')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('anak_korban_kekerasan_id');
        });

        Schema::dropIfExists('anak_korban_kekerasan');
    }
};
