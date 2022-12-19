<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPmksSeeder extends Seeder
{
    /**
     * Jika menambah jenis, atau mengubah nama
     * update juga kondisi di PmksFactory
     *
     * @return void
     */
    public function run()
    {
        $jenisPmks = [
            [
                'id' => '1',
                'nama' => 'Terlantar',
            ],[
                'id' => '2',
                'nama' => 'Gelandangan',
            ],[
                'id' => '3',
                'nama' => 'Pengemis',
            ],[
                'id' => '4',
                'nama' => 'Korban Bencana Alam',
            ],[
                'id' => '5',
                'nama' => 'Korban Bencana Sosial',
            ],[
                'id' => '6',
                'nama' => 'Komunitas Adat Terpencil',
            ],[
                'id' => '7',
                'nama' => 'Penyandang Disabilitas',
            ],[
                'id' => '8',
                'nama' => 'Anak Jalanan',
            ],[
                'id' => '9',
                'nama' => 'Anak Perlu Perlindungan',
            ],[
                'id' => '10',
                'nama' => 'Korban Kekerasan',
            ],[
                'id' => '11',
                'nama' => 'Anak Berhadapan dengan Hukum',
            ],[
                'id' => '12',
                'nama' => 'Tuna Susila',
            ],[
                'id' => '13',
                'nama' => 'Pemulung',
            ],[
                'id' => '14',
                'nama' => 'Kelompok Minoritas',
            ],[
                'id' => '15',
                'nama' => 'Bekas Warga Binaan Lembaga Permasyarakatan',
            ],[
                'id' => '16',
                'nama' => 'Orang Dengan HIV AIDS',
            ],[
                'id' => '17',
                'nama' => 'Korban Napza',
            ],[
                'id' => '18',
                'nama' => 'Korban Trafficking',
            ],[
                'id' => '19',
                'nama' => 'Pekerja Migran Bermasalah Sosial',
            ],[
                'id' => '20',
                'nama' => 'Perempuan Rawan Sosial',
            ],[
                'id' => '21',
                'nama' => 'Keluarga Bermasalah Sosial',
            ],
        ];
        foreach ($jenisPmks as $pmks) {
            \App\Models\Pmks\JenisPmks::Create($pmks);
        }
    }
}
