<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakPerluPerlindungan extends Model
{
    use HasFactory;

    protected $table = 'anak_perlu_perlindungan';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }
}
