<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
  
        $csvFile = fopen(base_path("database/data/kelurahan.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                Kelurahan::create([
                    "id" => $data['0'],
                    "kecamatan_id" => $data['1'],
                    "nama" => $data['2'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
