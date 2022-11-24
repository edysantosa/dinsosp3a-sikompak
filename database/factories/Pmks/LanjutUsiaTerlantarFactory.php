<?php

namespace Database\Factories\Pmks;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LanjutUsiaTerlantarFactory extends Factory
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
                'Anak',
                'Keponakan',
                'Tetangga',
                'Cucu',
            ]),
        ];
    }
}
