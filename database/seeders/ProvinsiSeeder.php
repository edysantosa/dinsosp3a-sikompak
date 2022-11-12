<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Provinsi::truncate();
        Schema::enableForeignKeyConstraints();
        DB::disableQueryLog();//disable log

        $json = File::get(base_path("database/data/provinsi.json"));
        $provinsis = json_decode($json, true);

        $chunks = array_chunk($provinsis, 5000);
        foreach ($chunks as $chunk) {
            Provinsi::insert($chunk);
        }
    }
}
