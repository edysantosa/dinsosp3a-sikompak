<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KorbanBencanaAlam extends Model
{
    use HasFactory;

    protected $table = 'korban_bencana_alam';
    public $timestamps = false;

    public function bencana()
    {
        return $this->belongsTo('App\Models\Pmks\JenisBencanaAlam');
    }
}
