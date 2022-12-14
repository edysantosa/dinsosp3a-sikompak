<?php

namespace Database\Factories\Pmks;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks\AnakJalanan;
use App\Models\Pmks\AnakPerluPerlindungan;
use App\Models\Pmks\Gelandangan;
use App\Models\Pmks\KomunitasAdatTerpencil;
use App\Models\Pmks\KorbanBencanaAlam;
use App\Models\Pmks\KorbanBencanaSosial;
use App\Models\Pmks\KorbanKekerasan;
use App\Models\Pmks\Pengemis;
use App\Models\Pmks\PenyandangDisabilitas;
use App\Models\Pmks\Terlantar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\Pmks>
 */
class PmksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $dt = $this->faker->dateTimeBetween($startDate = '-90 years', $endDate = 'now');
        $tglLahir = $dt->format("Y-m-d");

        // Randomise alamat
        $kabupaten = KabupatenKota::where('provinsi_id', '51')->get()->random()->id;
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $kabupaten)->get()->random()->id;
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get()->random()->id;

        return [
            'nik' => $this->faker->unique()->numerify("################"),
            'kartu_keluarga' => $this->faker->unique()->numerify("################"),
            'bpjs_kesehatan' => $this->faker->unique()->numerify("#############"),
            'is_kartu_indonesia_sehat' => $this->faker->randomElement([0, 1]),
            'nomor_rekening' => $this->faker->unique()->numerify('####-##-######-#'),
            'bank_nomor_rekening' => $this->faker->randomElement(['BNI', 'BRI', 'BPD Bali', 'Mandiri']),
            'nama' => $this->faker->name($gender),
            'jenis_kelamin' => $gender == 'male' ? 1 : 2,
            'tempat_lahir' => KabupatenKota::all()->random()->nama, // Random nama Kabupaten/Kota
            'tanggal_lahir' => $tglLahir,
            'provinsi_id' => '51', //Bali
            'kabupaten_kota_id' => $kabupaten,
            'kecamatan_id' => $kecamatan,
            'kelurahan_id' => $kelurahan,
            'alamat' => $this->faker->streetAddress(),
        ];
    }

    /**
     * Masukkan PMKS ke  terlantar
     * @param  bool $isDalamPanti status apakah 
     * anak / balita / lansia terlantar diasuh oleh
     * keluarga/lembaga penampung
     * @return Factory
     */
    public function terlantar($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'terlantar_id' => Terlantar::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke gelandangan
     * @param  bool $isDalamPanti status apakah gelandangan ditampung penampung
     * @return Factory
     */
    public function gelandangan($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'gelandangan_id' => Gelandangan::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke pengemis
     * @param  bool $isDalamPanti status apakah pengemis ditampung penampung
     * @return Factory
     */
    public function pengemis($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'pengemis_id' => Pengemis::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke korban bencana alam
     * @return Factory
     */
    public function korbanBencanaAlam()
    {
        return $this->state(function (array $attributes) {
            return [
                'korban_bencana_alam_id' => KorbanBencanaAlam::factory()->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke korban bencana sosial
     * @return Factory
     */
    public function korbanBencanaSosial()
    {
        return $this->state(function (array $attributes) {
            return [
                'korban_bencana_sosial_id' => KorbanBencanaSosial::factory()->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke komunitas adat terpencil
     * @return Factory
     */
    public function komunitasAdatTerpencil()
    {
        return $this->state(function (array $attributes) {
            return [
                'komunitas_adat_terpencil_id' => KomunitasAdatTerpencil::factory()->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke penyandang disabilitas
     * @param  bool $isDalamPanti status apakah penyandang disabilitas ditampung penampung
     * @return Factory
     */
    public function penyandangDisabilitas($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'penyandang_disabilitas_id' => PenyandangDisabilitas::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke anak jalanan
     * @param  bool $isDalamPanti status apakah anak jalanan diasuh oleh
     * keluarga/lembaga penampung
     * @return Factory
     */
    public function anakJalanan($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'anak_jalanan_id' => AnakJalanan::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke anak perlu perlindungan
     * @param  bool $isDalamPanti status apakah anak perlu perlindungan diasuh oleh
     * keluarga/lembaga penampung
     * @return Factory
     */
    public function anakPerluPerlindungan($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'anak_perlu_perlindungan_id' => AnakPerluPerlindungan::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }

    /**
     * Masukkan PMKS ke korban kekerasan
     * @param  bool $isDalamPanti status apakah korban kekerasan diasuh oleh
     * keluarga/lembaga penampung
     * parameter umur dibawah 18 dianggap sebagai anak
     * @return Factory
     */
    public function korbanKekerasan($isDalamPanti)
    {
        return $this->state(function (array $attributes) use ($isDalamPanti) {
            return [
                'korban_kekerasan_id' => KorbanKekerasan::factory()->isDalamPanti($isDalamPanti)->create()->id
            ];
        });
    }
}


/*
TODO:
- Kartu indonesia pintar nanti buat di state anak usia sekolah, random true/false
 */
