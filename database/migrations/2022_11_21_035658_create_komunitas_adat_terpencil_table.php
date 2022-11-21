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
        Schema::create('komunitas_adat_terpencil', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jumlah_laki');
            $table->unsignedInteger('jumlah_perempuan');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('komunitas_adat_terpencil_id')->nullable();
            $table->foreign('komunitas_adat_terpencil_id')->references('id')->on('komunitas_adat_terpencil')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('komunitas_adat_terpencil_id');
        });

        Schema::dropIfExists('komunitas_adat_terpencil');
    }
};
