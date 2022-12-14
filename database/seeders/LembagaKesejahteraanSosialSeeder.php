<?php

namespace Database\Seeders;

use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LembagaKesejahteraanSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LembagaKesejahteraanSosial::factory()->count(50)->create();
    }
}
