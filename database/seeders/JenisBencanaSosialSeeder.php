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
        // Menurut Permensos No.9 2018
        $bencanas = [
            [
                'id' => '1',
                'nama' => 'Konflik sosial',
            ],
            [
                'id' => '2',
                'nama' => 'Aksi teror',
            ],
            [
                'id' => '3',
                'nama' => 'Kebakaran pemukiman dan gedung',
            ],
            [
                'id' => '4',
                'nama' => 'Wabah/epidemi',
            ],
            [
                'id' => '5',
                'nama' => 'Gagal teknologi',
            ],
            [
                'id' => '6',
                'nama' => 'Kebakaran hutan dan lahan',
            ],
        ];
        foreach ($bencanas as $bencana) {
            \App\Models\Pmks\JenisBencanaSosial::Create($bencana);
        }
    }
}
