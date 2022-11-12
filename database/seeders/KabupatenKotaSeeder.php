<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
  
        $csvFile = fopen(base_path("database/data/kabupaten_kota.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                KabupatenKota::create([
                    "id" => $data['0'],
                    "provinsi_id" => $data['1'],
                    "nama" => $data['2'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
