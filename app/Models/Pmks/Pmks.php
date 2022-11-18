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
}
