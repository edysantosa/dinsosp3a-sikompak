<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function kelurahan()
    {
        return $this->hasMany('App\Models\Kelurahan');
    }
}
