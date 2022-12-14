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
            Pmks::factory()->count(100)->terlantar(true)->create();
            Pmks::factory()->count(100)->terlantar(false)->create();
            Pmks::factory()->count(100)->gelandangan(true)->create();
            Pmks::factory()->count(100)->gelandangan(false)->create();
            Pmks::factory()->count(100)->pengemis(true)->create();
            Pmks::factory()->count(100)->pengemis(false)->create();
            Pmks::factory()->count(100)->korbanBencanaAlam()->create();
            Pmks::factory()->count(100)->korbanBencanaSosial()->create();
            Pmks::factory()->count(100)->komunitasAdatTerpencil()->create();
            Pmks::factory()->count(100)->penyandangDisabilitas(true)->create();
            Pmks::factory()->count(100)->penyandangDisabilitas(false)->create();
            Pmks::factory()->count(100)->anakJalanan(true)->create();
            Pmks::factory()->count(100)->anakJalanan(false)->create();
            Pmks::factory()->count(100)->anakPerluPerlindungan(true)->create();
            Pmks::factory()->count(100)->anakPerluPerlindungan(false)->create();
            Pmks::factory()->count(100)->korbanKekerasan(true)->create();
            Pmks::factory()->count(100)->korbanKekerasan(false)->create();
        }
    }
}
