<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKekerasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kekerasans = [
            [
                'id' => '1',
                'nama' => 'Kekerasan Fisik',
            ],
            [
                'id' => '2',
                'nama' => 'Kekerasan Psikis',
            ],
            [
                'id' => '3',
                'nama' => 'Kekerasan Seksual',
            ],
            [
                'id' => '9',
                'nama' => 'Kekerasan Lainnya',
            ],
        ];
        foreach ($kekerasans as $kekerasan) {
            \App\Models\Pmks\JenisKekerasan::Create($kekerasan);
        }
    }
}
