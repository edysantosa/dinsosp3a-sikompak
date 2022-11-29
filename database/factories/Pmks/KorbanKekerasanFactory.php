<?php

namespace Database\Factories\Pmks;

use App\Models\Pmks\JenisDisabilitas;
use App\Models\Pmks\JenisKekerasan;
use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\PenyandangDisabilitas>
 */
class KorbanKekerasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'nama_samaran' => $this->faker->name($gender),
            'nama_keluarga' => $this->faker->name($this->faker->randomElement(['male', 'female'])),
            'hubungan_keluarga' => $this->faker->randomElement([
                'Bibi',
                'Paman',
                'Orang Tua',
                'Tetangga',
                'Sepupu',
                'Saudara',
            ]),
            'jenis_kekerasan_id' => JenisKekerasan::all()->random()->id
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
