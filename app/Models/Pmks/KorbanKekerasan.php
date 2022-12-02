<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KorbanKekerasan extends Model
{
    // TODO: buat accessor untuk status anak / dewasa
    use HasFactory;

    protected $table = 'korban_kekerasan';
    public $timestamps = false;

    public function kekerasan()
    {
        return $this->belongsTo('App\Models\Pmks\JenisKekerasan');
    }
}
