<?php

namespace Database\Factories\Pmks;

use App\Models\Pmks\JenisBencanaAlam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\KorbanBencanaAlam>
 */
class KorbanBencanaAlamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $dt = $this->faker->dateTimeBetween($startDate = '-12 months', $endDate = 'now');
        // $tglBencana = $dt->format("Y-m-d");

        return [
            'tanggal_bencana' => $this->faker->dateTimeBetween($startDate = '-12 months', $endDate = 'now')->format("Y-m-d"),
            'jenis_bencana_alam_id' => JenisBencanaAlam::all()->random()->id,
            'jumlah_korban' => $this->faker->randomNumber(4, false),
        ];
    }
}
