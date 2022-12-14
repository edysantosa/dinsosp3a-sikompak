<?php

namespace Database\Factories\Pmks;

use App\Models\Pmks\JenisDisabilitas;
use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\PenyandangDisabilitas>
 */
class PenyandangDisabilitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_keluarga' => $this->faker->name($this->faker->randomElement(['male', 'female'])),
            'hubungan_keluarga' => $this->faker->randomElement([
                'Bibi',
                'Paman',
                'Orang Tua',
                'Anak',
                'Keponakan',
                'Tetangga',
                'Cucu',
            ]),
            'jenis_disabilitas_id' => JenisDisabilitas::all()->random()->id
        ];
    }

    public function isDalamPanti($isDalamPanti)
    {
        if ($isDalamPanti) {
            return $this->state(function (array $attributes) {
                return [
                    'nama_keluarga' => null,
                    'hubungan_keluarga' => null,
                    'lembaga_kesejahteraan_sosial_id' => LembagaKesejahteraanSosial::all()->random()->id
                ];
            });
        } else {
            return $this;
        }
    }
}
