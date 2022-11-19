<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaKesejahteraanSosial extends Model
{
    use HasFactory;

    protected $table = 'lembaga_kesejahteraan_sosial';


    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi');
    }

    public function kabupatenKota()
    {
        return $this->belongsTo('App\Models\KabupatenKota');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Models\Kelurahan');
    }
}
