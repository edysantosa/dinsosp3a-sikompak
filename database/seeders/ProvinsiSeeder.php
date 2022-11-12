<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
  
        $csvFile = fopen(base_path("database/data/provinsi.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== false) {
            if (!$firstline) {
                Provinsi::create([
                    "id" => $data['0'],
                    "nama" => $data['1']
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
