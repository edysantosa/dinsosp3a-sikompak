<?php

namespace Database\Seeders;

use Database\Seeders\JenisPmksSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([MenuSeeder::class]);
        $this->call([RoleSeeder::class]);
        $this->call([RoleUserSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([ProvinsiSeeder::class]);
        $this->call([KabupatenKotaSeeder::class]);
        $this->call([KecamatanSeeder::class]);
        $this->call([KelurahanSeeder::class]);
        $this->call([JenisDisabilitasSeeder::class]);
        $this->call([JenisKekerasanSeeder::class]);
        $this->call([JenisBencanaSosialSeeder::class]);
        $this->call([JenisBencanaAlamSeeder::class]);
        $this->call([JenisPmksSeeder::class]);

        // Seeder untuk data dummy, jangan digunakan untuk deploy ke production
        $this->call([LembagaKesejahteraanSosialSeeder::class]);
        // $this->call([PmksSeeder::class]);
    }
}
