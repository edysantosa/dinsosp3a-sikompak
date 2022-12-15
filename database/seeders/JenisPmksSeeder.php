<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPmksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPmks = [
            [
                'id' => '1',
                'name' => 'Terlantar',
            ],            [
                'id' => '2',
                'name' => 'Gelandangan',
            ],            [
                'id' => '3',
                'name' => 'Pengemis',
            ],            [
                'id' => '4',
                'name' => 'Korban Bencana Alam',
            ],            [
                'id' => '5',
                'name' => 'Korban Bencana Sosial',
            ],            [
                'id' => '6',
                'name' => 'Komunitas Adat Terpencil',
            ],            [
                'id' => '7',
                'name' => 'Penyandang Disabilitas',
            ],            [
                'id' => '8',
                'name' => 'Anak Jalanan',
            ],            [
                'id' => '9',
                'name' => 'Anak Perlu Perlindungan',
            ],            [
                'id' => '10',
                'name' => 'Korban Kekerasan',
            ],
        ];
        foreach ($jenisPmks as $pmks) {
            \App\Models\Pmks\JenisPmks::Create($pmks);
        }
    }
}
