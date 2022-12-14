<?php

namespace Database\Factories\Pmks;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\KomunitasAdatTerpencil>
 */
class KomunitasAdatTerpencilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jumlah_laki' => $this->faker->randomNumber(4, false),
            'jumlah_perempuan' => $this->faker->randomNumber(4, false),
        ];
    }
}
