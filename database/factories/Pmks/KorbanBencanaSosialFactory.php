<?php

namespace Database\Factories\Pmks;

use App\Models\Pmks\JenisBencanaSosial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\KorbanBencanaSosial>
 */
class KorbanBencanaSosialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tanggal_bencana' => $this->faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now')->format("Y-m-d"),
            'jenis_bencana_sosial_id' => JenisBencanaSosial::all()->random()->id,
            'jumlah_korban' => $this->faker->randomNumber(4, false),
        ];
    }
}
