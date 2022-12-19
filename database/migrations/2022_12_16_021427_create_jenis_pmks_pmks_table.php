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
        Schema::create('jenis_pmks_pmks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pmks_id')->constrained()->onDelete('cascade');
            $table->foreignId('pmks_id')->constrained()->onDelete('cascade');

            /**
             * Informasi siapa yang mengasuh pmks
             * Apabila diasuh keluarga, kolom nama keluarga dan hubungan keluarga diisi
             * Jika diasuh oleh panti diisi id lembaga kesejahteraan sosial
             */
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan_keluarga')->nullable();

            // Relasi dengan lembaga kesejahteraan sosial
            $table->unsignedBigInteger('lembaga_kesejahteraan_sosial_id')->nullable();
            $table->foreign('lembaga_kesejahteraan_sosial_id')->references('id')->on('lembaga_kesejahteraan_sosial')->onDelete('cascade');

            // Relasi dengan jenis disabilitas
            $table->unsignedBigInteger('jenis_disabilitas_id')->nullable();
            $table->foreign('jenis_disabilitas_id')->references('id')->on('jenis_disabilitas')->onDelete('cascade');

            // Relasi dengan jenis kekerasan
            $table->unsignedBigInteger('jenis_kekerasan_id')->nullable();
            $table->foreign('jenis_kekerasan_id')->references('id')->on('jenis_kekerasan')->onDelete('cascade');


            /**
             * Informasi Kebencanaan
             */
            $table->date('tanggal_bencana')->nullable();
            $table->unsignedInteger('jumlah_korban')->nullable();
            // Relasi dengan jenis bencana alam
            $table->unsignedBigInteger('jenis_bencana_alam_id')->nullable();
            $table->foreign('jenis_bencana_alam_id')->references('id')->on('jenis_bencana_alam')->onDelete('cascade');
            // Relasi dengan jenis bencana sosial
            $table->unsignedBigInteger('jenis_bencana_sosial_id')->nullable();
            $table->foreign('jenis_bencana_sosial_id')->references('id')->on('jenis_bencana_sosial')->onDelete('cascade');
            

            /**
             * Komunitas adat terpencil
             */
            $table->unsignedInteger('jumlah_laki')->nullable();
            $table->unsignedInteger('jumlah_perempuan')->nullable();


            /**
             * Status anak yang berhadapan dengan hukum
             */
            $table->string('status_hukum')->nullable();


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
        Schema::dropIfExists('jenis_pmks_pmks');
    }
};
