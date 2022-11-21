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
        Schema::create('korban_bencana_alam', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bencana');
            $table->unsignedInteger('jumlah_korban');
            $table->unsignedBigInteger('jenis_bencana_alam_id');
            $table->foreign('jenis_bencana_alam_id')->references('id')->on('jenis_bencana_alam')->onDelete('cascade');
        });

        Schema::table('pmks', function (Blueprint $table) {
            $table->unsignedBigInteger('korban_bencana_alam_id')->nullable();
            $table->foreign('korban_bencana_alam_id')->references('id')->on('korban_bencana_alam')->onDelete('cascade');
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
            $table->dropConstrainedForeignId('korban_bencana_alam_id');
        });

        Schema::dropIfExists('korban_bencana_alam');
    }
};
