<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakKorbanKekerasan extends Model
{
    use HasFactory;

    protected $table = 'anak_korban_kekerasan';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }

    public function kekerasan()
    {
        return $this->belongsTo('App\Models\Pmks\JenisKekerasan');
    }
}
