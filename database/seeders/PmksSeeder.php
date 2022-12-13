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
        for ($i=0; $i < 100; $i++) { 
            // Pmks::factory()->count(500)->create();
            Pmks::factory()->count(500)->terlantar(true)->create();
            Pmks::factory()->count(500)->terlantar(false)->create();
            Pmks::factory()->count(500)->gelandangan(true)->create();
            Pmks::factory()->count(500)->gelandangan(false)->create();
            Pmks::factory()->count(500)->pengemis(true)->create();
            Pmks::factory()->count(500)->pengemis(false)->create();
            Pmks::factory()->count(500)->korbanBencanaAlam()->create();
            Pmks::factory()->count(500)->korbanBencanaSosial()->create();
            Pmks::factory()->count(500)->komunitasAdatTerpencil()->create();
            Pmks::factory()->count(500)->penyandangDisabilitas(true)->create();
            Pmks::factory()->count(500)->penyandangDisabilitas(false)->create();
            Pmks::factory()->count(500)->anakJalanan(true)->create();
            Pmks::factory()->count(500)->anakJalanan(false)->create();
            Pmks::factory()->count(500)->anakPerluPerlindungan(true)->create();
            Pmks::factory()->count(500)->anakPerluPerlindungan(false)->create();
            Pmks::factory()->count(500)->korbanKekerasan(true)->create();
            Pmks::factory()->count(500)->korbanKekerasan(false)->create();
        }
    }
}
