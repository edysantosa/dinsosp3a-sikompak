<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakBalitaTerlantar extends Model
{
    // TODO: buat accessor untuk status anak/balita
    // Umur lima tahun kebawah = balita, diatas lima tahun = anak
    use HasFactory;

    protected $table = 'anak_balita_terlantar';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }
}
