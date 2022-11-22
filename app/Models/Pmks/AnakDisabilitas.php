<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'anak_disabilitas';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Pmks\LembagaKesejahteraanSosial');
    }

    public function disabilitas()
    {
        return $this->belongsTo('App\Models\Pmks\JenisDisabilitas');
    }
}
