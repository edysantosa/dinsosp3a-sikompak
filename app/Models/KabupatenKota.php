<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;

    protected $table = 'kabupaten_kota';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
