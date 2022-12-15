<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPmks extends Model
{
    use HasFactory;

    protected $table = 'jenis_pmks';
    public $timestamps = false;  
}
