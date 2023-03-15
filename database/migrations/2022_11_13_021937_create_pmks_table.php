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
        Schema::create('pmks', function (Blueprint $table) {
            $table->id();
            $table->ulid('uid');
            $table->string('nik', 16)->nullable();
            $table->string('kartu_keluarga', 16)->nullable();
            $table->string('bpjs_kesehatan', 13)->nullable();
            $table->boolean('is_kartu_indonesia_sehat')->default(0)->comment('Kalau true berarti pemegang program JKN-KIS');
            $table->string('kartu_indonesia_pintar', 6)->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('bank_nomor_rekening')->nullable()->comment('nama bank untuk nomor_rekening');
            $table->string('nama');
            $table->unsignedTinyInteger('jenis_kelamin')->comment('sesuai ISO/IEC 5218');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');

            $table->string('provinsi_id', 13)->nullable();
            $table->foreign('provinsi_id')->references('id')->on('provinsi')->onDelete('restrict');
            $table->string('kabupaten_kota_id', 13)->nullable();
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupaten_kota')->onDelete('restrict');
            $table->string('kecamatan_id', 13)->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('restrict');
            $table->string('kelurahan_id', 13)->nullable();
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onDelete('restrict');
            $table->string('alamat')->nullable();

            $table->string('delete_reason')->nullable()->comment('Alasan data dihapus oleh user');
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
        Schema::dropIfExists('pmks');
    }
};
