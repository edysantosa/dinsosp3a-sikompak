<?php

namespace App\Models\Pmks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JenisPmksPmks extends Pivot
{
    protected $table = 'jenis_pmks_pmks';
    public $incrementing = true;

    /**
     * Siapkan tabel pivot custom sewaktu-waktu dibutuhkan
     */
}
