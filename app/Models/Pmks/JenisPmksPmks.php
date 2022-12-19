<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JenisPmksPmks extends Pivot
{
    protected $table = 'jenis_pmks_pmks';
    public $incrementing = true;

    public function lembagaKesejahteraanSosial()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }

    public function jenisDisabilitas()
    {
        return $this->belongsTo('App\Models\Pmks\JenisDisabilitas');
    }

    public function jenisKekerasan()
    {
        return $this->belongsTo('App\Models\Pmks\JenisKekerasan');
    }

    public function jenisBencanaAlam()
    {
        return $this->belongsTo('App\Models\Pmks\JenisBencanaAlam');
    }

    public function jenisBencanaSosial()
    {
        return $this->belongsTo('App\Models\Pmks\JenisBencanaSosial');
    }
}
