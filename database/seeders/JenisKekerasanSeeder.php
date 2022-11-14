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
                'nama' => 'Disabilitas fisik',
            ],
            [
                'id' => '2',
                'nama' => 'Disabilitas intelektual',
            ],
            [
                'id' => '3',
                'nama' => 'Disabilitas mental',
            ],
            [
                'id' => '4',
                'nama' => 'Disabilitas netra',
            ],
            [
                'id' => '5',
                'nama' => 'Disabilitas rungu',
            ],
            [
                'id' => '6',
                'nama' => 'Disabilitas wicara',
            ],
        ];
        foreach ($kekerasans as $kekerasan) {
            \App\Models\Pmks\JenisKekerasan::Create($kekerasan);
        }
    }
}
