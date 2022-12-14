<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyandangDisabilitas extends Model
{
    // TODO: buat accessor untuk status anak / dewasa
    use HasFactory;

    protected $table = 'penyandang_disabilitas';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }
    
    public function disabilitas()
    {
        return $this->belongsTo('App\Models\Pmks\PenyandangDisabilitas');
    }
}
