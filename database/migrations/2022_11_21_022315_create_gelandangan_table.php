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
        Schema::create('gelandangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lembaga_kesejahteraan_sosial_id')->nullable();
            $table->foreign('lembaga_kesejahteraan_sosial_id')->references('id')->on('lembaga_kesejahteraan_sosial')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('gelandangan_id')->nullable();
            $table->foreign('gelandangan_id')->references('id')->on('gelandangan')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('gelandangan_id');
        });

        Schema::dropIfExists('gelandangan');
    }
};
