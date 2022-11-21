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
        Schema::create('penyandang_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan_keluarga')->nullable();

            $table->unsignedBigInteger('jenis_bencana_sosial_id');
            $table->foreign('jenis_bencana_sosial_id')->references('id')->on('jenis_bencana_sosial')->onDelete('cascade');

            $table->unsignedBigInteger('jenis_disabilitas_id');
            $table->foreign('jenis_disabilitas_id')->references('id')->on('jenis_disabilitas')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('penyandang_disabilitas_id')->nullable();
            $table->foreign('penyandang_disabilitas_id')->references('id')->on('penyandang_disabilitas')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('penyandang_disabilitas_id');
        });

        Schema::dropIfExists('penyandang_disabilitas');
    }
};
