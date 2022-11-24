<?php

namespace Database\Factories\Pmks;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks\LanjutUsiaTerlantar;
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

    public function lanjutUsiaTerlantar()
    {
        return $this->state(function (array $attributes) {
            return [
                'lanjut_usia_terlantar_id' => LanjutUsiaTerlantar::factory()->create()->id
            ];
        });
    }
}



/*
TODO:
- Kartu indonesia pintar nanti buat di state anak usia sekolah, random true/false
 */
