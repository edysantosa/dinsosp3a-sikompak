<?php

namespace App\Models\Pmks;

use App\Models\Pmks\JenisPmksPmks;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pmks extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'pmks';

    protected $fillable = [
        'nik',
        'tanggal_lahir',
        'kartu_keluarga',
        'bpjs_kesehatan',
        'nama',
        'jenis_kelamin',
        'provinsi_id',
        'kabupaten_kota_id',
        'kecamatan_id',
        'kelurahan_id',
    ];


    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array
     */
    public function uniqueIds()
    {
        return ['uid'];
    }

    /******************************************************************************/
    /**
     * Scope untuk query berdasarkan definisi dewasa, anak dan balita
     * NOTE: Scope anak termasuk dalam balita, anak <= 18th, balita <= 5 tahun
     */
    public function scopeAnak($query)
    {
        return $query->where('tanggal_lahir', '<=', Carbon::now()->subYears(18)->toDateString());
    }

    public function isAnak() : bool
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age <= 18;
    }

    public function scopeBalita($query)
    {
        return $query->where('tanggal_lahir', '<=', Carbon::now()->subYears(5)->toDateString());
    }

    public function isBalita() : bool
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age <= 5;
    }

    public function scopeDewasa($query)
    {
        return $query->where('tanggal_lahir', '>', Carbon::now()->subYears(18)->toDateString());
    }

    public function isDewasa() : bool
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age > 18;
    }

    public function scopeLansia($query)
    {
        return $query->where('tanggal_lahir', '>', Carbon::now()->subYears(60)->toDateString());
    }

    public function isLansia() : bool
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age > 60;
    }

    /******************************************************************************/

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

    public function jenisPmks()
    {
        return $this->belongsToMany('App\Models\Pmks\JenisPmks');
    }

    public function jenisPmksDetail()
    {
        return $this->belongsToMany('App\Models\Pmks\JenisPmks')
                // ->as('informasi_tambahan')
                ->using(JenisPmksPmks::class)
                ->withTimestamps()
                ->withPivot([
                    'nama_keluarga',
                    'hubungan_keluarga',
                    'lembaga_kesejahteraan_sosial_id',
                    'jenis_disabilitas_id',
                    'jenis_kekerasan_id',
                    'tanggal_bencana',
                    'jumlah_korban',
                    'jenis_bencana_alam_id',
                    'jenis_bencana_sosial_id',
                    'jumlah_laki',
                    'jumlah_perempuan',
                    'status_hukum',
                ]);
    }
}
