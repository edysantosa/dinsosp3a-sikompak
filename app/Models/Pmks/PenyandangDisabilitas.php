<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyandangDisabilitas extends Model
{
    use HasFactory;

    protected $table = 'penyandang_disabilitas';
    public $timestamps = false;

    public function disabilitas()
    {
        return $this->belongsTo('App\Models\Pmks\PenyandangDisabilitas');
    }
}
