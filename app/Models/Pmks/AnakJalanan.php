<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakJalanan extends Model
{
    use HasFactory;

    protected $table = 'anak_jalanan';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Psks\LembagaKesejahteraanSosial');
    }
}
