<?php

namespace Database\Factories\Psks;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Psks\LembagaKesejahteraanSosial>
 */
class LembagaKesejahteraanSosialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Randomise alamat
        $kabupaten = KabupatenKota::where('provinsi_id', '51')->get()->random()->id;
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $kabupaten)->get()->random()->id;
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get()->random()->id;

        return [
            'nama' => $this->faker->company(),
            'provinsi_id' => '51', //Bali
            'kabupaten_kota_id' => $kabupaten,
            'kecamatan_id' => $kecamatan,
            'kelurahan_id' => $kelurahan,
            'alamat' => $this->faker->streetAddress(),
        ];
    }
}
