<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Kecamatan::truncate();
        Schema::enableForeignKeyConstraints();
        DB::disableQueryLog();//disable log

        $json = File::get(base_path("database/data/kecamatan.json"));
        $kecamatans = json_decode($json, true);

        $chunks = array_chunk($kecamatans, 5000);
        foreach ($chunks as $chunk) {
            Kecamatan::insert($chunk);
        }
    }
}
