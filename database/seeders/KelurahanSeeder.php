<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Kelurahan::truncate();
        Schema::enableForeignKeyConstraints();
        DB::disableQueryLog();//disable log

        $json = File::get(base_path("database/data/kelurahan.json"));
        $kelurahans = json_decode($json, true);

        $chunks = array_chunk($kelurahans, 5000);
        foreach ($chunks as $chunk) {
            Kelurahan::insert($chunk);
        }
    }
}
