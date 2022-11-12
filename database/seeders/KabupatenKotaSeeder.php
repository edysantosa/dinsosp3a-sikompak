<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        KabupatenKota::truncate();
        Schema::enableForeignKeyConstraints();
        DB::disableQueryLog();//disable log

        $json = File::get(base_path("database/data/kabupaten_kota.json"));
        $kabupatenKotas = json_decode($json, true);

        $chunks = array_chunk($kabupatenKotas, 5000);
        foreach ($chunks as $chunk) {
            KabupatenKota::insert($chunk);
        }
    }
}
