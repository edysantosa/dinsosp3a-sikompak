<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
  
        $csvFile = fopen(base_path("database/data/kecamatan.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== false) {
            if (!$firstline) {
                Kecamatan::create([
                    "id" => $data['0'],
                    "kabupaten_kota_id" => $data['1'],
                    "nama" => $data['2'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
