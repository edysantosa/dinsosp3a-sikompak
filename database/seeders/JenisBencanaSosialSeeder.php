<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBencanaSosialSeeder extends Seeder
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
                'nama' => 'Konflik Sosial',
            ],
            [
                'id' => '2',
                'nama' => 'Aksi Teror',
            ],
            [
                'id' => '3',
                'nama' => 'Sabotase',
            ],
        ];
        foreach ($bencanas as $bencana) {
            \App\Models\Pmks\JenisBencanaSosial::Create($bencana);
        }
    }
}
