<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanjutUsiaTerlantar extends Model
{
    use HasFactory;

    protected $table = 'lanjut_usia_terlantar';

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Pmks\LembagaKesejahteraanSosial');
    }
}
