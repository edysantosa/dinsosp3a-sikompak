<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KorbanBencanaSosial extends Model
{
    use HasFactory;

    protected $table = 'korban_bencana_sosial';
    public $timestamps = false;

    public function bencana()
    {
        return $this->belongsTo('App\Models\Pmks\JenisBencanaSosial');
    }
}
