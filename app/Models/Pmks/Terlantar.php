<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terlantar extends Model
{
    // TODO: buat accessor untuk status anak / balita / lansia
    // Umur 5 tahun kebawah = balita, diatas 5 tahun = anak, diatas 58 th = lansia
    use HasFactory;

    protected $table = 'terlantar';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }
}
