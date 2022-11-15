<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBencanaAlamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menurut Permensos No.9 2018
        $bencanas = [
            [
                'id' => '1',
                'nama' => 'Gempa Bumi',
            ],
            [
                'id' => '2',
                'nama' => 'Tsunami',
            ],
            [
                'id' => '3',
                'nama' => 'Banjir',
            ],
            [
                'id' => '4',
                'nama' => 'Tanah longsor',
            ],
            [
                'id' => '5',
                'nama' => 'Letusan gunung spi',
            ],
            [
                'id' => '6',
                'nama' => 'Gelombang laut ekstrim',
            ],
            [
                'id' => '7',
                'nama' => 'Angin Topan',
            ],
            [
                'id' => '8',
                'nama' => 'Kekeringan',
            ],
        ];
        foreach ($bencanas as $bencana) {
            \App\Models\Pmks\JenisBencanaAlam::Create($bencana);
        }
    }
}
