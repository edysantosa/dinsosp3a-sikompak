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
        Schema::create('korban_kekerasan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_samaran')->nullable();

            $table->unsignedBigInteger('jenis_kekerasan_id');
            $table->foreign('jenis_kekerasan_id')->references('id')->on('jenis_kekerasan')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('korban_kekerasan_id')->nullable();
            $table->foreign('korban_kekerasan_id')->references('id')->on('korban_kekerasan')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('korban_kekerasan_id');
        });

        Schema::dropIfExists('korban_kekerasan');
    }
};
