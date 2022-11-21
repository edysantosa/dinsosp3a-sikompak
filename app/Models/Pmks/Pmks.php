<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pmks extends Model
{
    use HasFactory;

    protected $table = 'pmks';

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

    // Lanjut usia terlantar
    public function lanjutUsiaTerlantar()
    {
        return $this->belongsTo('App\Models\Pmks\LanjutUsiaTerlantar');
    }

    // Gelandangan
    public function gelandangan()
    {
        return $this->belongsTo('App\Models\Pmks\LanjutUsiaTerlantar');
    }

    // Pengemis
    public function pengemis()
    {
        return $this->belongsTo('App\Models\Pmks\Pengemis');
    }

    // Korban bencana alam
    public function korbanBencanaAlam()
    {
        return $this->belongsTo('App\Models\Pmks\KorbanBencanaAlam');
    }

    // Korban bencana sosial
    public function korbanBencanaSosial()
    {
        return $this->belongsTo('App\Models\Pmks\KorbanBencanaSosial');
    }

    // Komunitas adat terpencil
    public function komunitasAdatTerpencil()
    {
        return $this->belongsTo('App\Models\Pmks\KomunitasAdatTerpencil');
    }
}
