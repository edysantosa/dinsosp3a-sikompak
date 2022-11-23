<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKekerasan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kekerasan';
    public $timestamps = false;
}
