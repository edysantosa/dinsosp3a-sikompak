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
        // Menurut UU No. 24 Tahun 2007
        $bencanas = [
            [
                'id' => '1',
                'nama' => 'Tanah Longsor',
            ],
            [
                'id' => '2',
                'nama' => 'Gempa Bumi',
            ],
            [
                'id' => '3',
                'nama' => 'Tsunami',
            ],
            [
                'id' => '4',
                'nama' => 'Banjir',
            ],
            [
                'id' => '5',
                'nama' => 'Letusan Gunung Api',
            ],
            [
                'id' => '6',
                'nama' => 'Angin topan',
            ],
            [
                'id' => '7',
                'nama' => 'Kekeringan',
            ],
            [
                'id' => '8',
                'nama' => 'Kebakaran Hutan',
            ],
        ];
        foreach ($bencanas as $bencana) {
            \App\Models\Pmks\JenisBencanaAlam::Create($bencana);
        }
    }
}
