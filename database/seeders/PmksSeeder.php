<?php

namespace Database\Seeders;

use App\Models\Pmks\LanjutUsiaTerlantar;
use App\Models\Pmks\Pmks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PmksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pmks::factory()->count(2)->create();
        // Pmks::factory()->count(2)->lanjutUsiaTerlantar(true)->create();
        // Pmks::factory()->count(2)->lanjutUsiaTerlantar(false)->create();
        // Pmks::factory()->count(2)->gelandangan(true)->create();
        // Pmks::factory()->count(2)->gelandangan(false)->create();
        // Pmks::factory()->count(2)->pengemis(true)->create();
        // Pmks::factory()->count(2)->pengemis(false)->create();
        // Pmks::factory()->count(2)->korbanBencanaAlam()->create();
        Pmks::factory()->count(2)->korbanBencanaSosial()->create();
    }
}
