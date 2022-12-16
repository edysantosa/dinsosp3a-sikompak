<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPmks extends Model
{
    public const TERLANTAR = 1;
    public const GELANDANGAN = 2;
    public const PENGEMIS = 3;
    public const KORBAN_BENCANA_ALAM = 4;
    public const KORBAN_BENCANA_SOSIAL = 5;
    public const KOMUNITAS_ADAT_TERPENCIL = 6;
    public const PENYANDANG_DISABILITAS = 7;
    public const ANAK_JALANAN = 8;
    public const ANAK_PERLU_PERLINDUNGAN = 9;
    public const KORBAN_KEKERASAN = 10;
    public const ANAK_BERHADAPAN_HUKUM = 11; //Anak yang Berhadapan dengan Hukum
    public const TUNA_SUSILA = 12;
    public const PEMULUNG = 13;
    public const KELOMPOK_MINORITAS = 14;
    public const BWBLP = 15; // Bekas Warga Binaan Lembaga Permasyarakatan
    public const ODHA = 16; //Orang Dengan HIV AIDS
    public const KORBAN_NAPZA = 17;
    public const KORBAN_TRAFFICKING = 18;
    public const PEKERJA_MIGRAN = 19; // Pekerja Migran Bermasalah Sosial
    public const PEREMPUAN_RAWAN = 20; // Perempuan Rawan Sosial
    public const KELUARGA_BERMASALAH = 21; // Keluarga Bermasalah Sosial



    use HasFactory;

    protected $table = 'jenis_pmks';
    public $timestamps = false;  

    public function pmks()
    {
        return $this->belongsToMany('App\Models\Pmks\Pmks');
    }
}
