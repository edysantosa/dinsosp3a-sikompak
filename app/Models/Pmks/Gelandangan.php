<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelandangan extends Model
{
    use HasFactory;

    protected $table = 'gelandangan';
    public $timestamps = false;

    public function lembagaPenampung()
    {
        return $this->belongsTo('App\Models\Pmks\LembagaKesejahteraanSosial');
    }
}
