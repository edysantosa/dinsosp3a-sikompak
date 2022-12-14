<?php

namespace Database\Factories\Pmks;

use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\Pengemis>
 */
class PengemisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lembaga_kesejahteraan_sosial_id' => null,
        ];
    }

    public function isDalamPanti($isDalamPanti)
    {
        if ($isDalamPanti) {
            return $this->state(function (array $attributes) {
                return [
                    'lembaga_kesejahteraan_sosial_id' => LembagaKesejahteraanSosial::all()->random()->id
                ];
            });
        } else {
            return $this;
        }
    }
}
