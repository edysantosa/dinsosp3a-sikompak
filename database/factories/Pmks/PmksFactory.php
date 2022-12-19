<?php

namespace Database\Factories\Pmks;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks\AnakJalanan;
use App\Models\Pmks\AnakPerluPerlindungan;
use App\Models\Pmks\Gelandangan;
use App\Models\Pmks\JenisBencanaAlam;
use App\Models\Pmks\JenisBencanaSosial;
use App\Models\Pmks\JenisDisabilitas;
use App\Models\Pmks\JenisKekerasan;
use App\Models\Pmks\JenisPmks;
use App\Models\Pmks\KomunitasAdatTerpencil;
use App\Models\Pmks\KorbanBencanaAlam;
use App\Models\Pmks\KorbanBencanaSosial;
use App\Models\Pmks\KorbanKekerasan;
use App\Models\Pmks\Pengemis;
use App\Models\Pmks\PenyandangDisabilitas;
use App\Models\Pmks\Pmks;
use App\Models\Pmks\Terlantar;
use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pmks\Pmks>
 */
class PmksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $dt = $this->faker->dateTimeBetween($startDate = '-90 years', $endDate = 'now');
        $tglLahir = $dt->format("Y-m-d");

        // Randomise alamat
        $kabupaten = KabupatenKota::where('provinsi_id', '51')->get()->random()->id;
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $kabupaten)->get()->random()->id;
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get()->random()->id;

        return [
            'nik' => $this->faker->unique()->numerify("################"),
            'kartu_keluarga' => $this->faker->unique()->numerify("################"),
            'bpjs_kesehatan' => $this->faker->unique()->numerify("#############"),
            'is_kartu_indonesia_sehat' => $this->faker->randomElement([0, 1]),
            'nomor_rekening' => $this->faker->unique()->numerify('####-##-######-#'),
            'bank_nomor_rekening' => $this->faker->randomElement(['BNI', 'BRI', 'BPD Bali', 'Mandiri']),
            'nama' => $this->faker->name($gender),
            'jenis_kelamin' => $gender == 'male' ? 1 : 2,
            'tempat_lahir' => KabupatenKota::all()->random()->nama, // Random nama Kabupaten/Kota
            'tanggal_lahir' => $tglLahir,
            'provinsi_id' => '51', //Bali
            'kabupaten_kota_id' => $kabupaten,
            'kecamatan_id' => $kecamatan,
            'kelurahan_id' => $kelurahan,
            'alamat' => $this->faker->streetAddress(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Pmks $pmks) {

            if ($pmks->isAnak()) {
                $pmks->kartu_indonesia_pintar = $this->faker->regexify('[A-Z0-9]{6}');
                $pmks->save();
            }

            // Jumlah jenis masalah sosial yang dimiliki oleh PMKS
            // sebagai simulasi PMKS bisa memiliki lebih dari satu masalah sosial (max 3)
            $jumlahPMKS = $this->faker->biasedNumberBetween(1, 3, 'Faker\Provider\Biased::linearLow');

            $arrAdditionalData = [];
            for ($i=0; $i < $jumlahPMKS; $i++) {
                $jenisPmks = JenisPmks::all()->random();
                $existingJenis = \App\Models\Pmks\JenisPmksPmks::where('pmks_id', $pmks->id)->get()->pluck('jenis_pmks_id')->toArray();
                if (in_array($jenisPmks->id, $existingJenis)) {
                    break;
                }


                $additionalData = [];
                $isDalamPanti = $this->faker->randomElement([0, 1]);

                switch ($jenisPmks->id) {
                    case JenisPmks::KORBAN_KEKERASAN:
                    case JenisPmks::ANAK_PERLU_PERLINDUNGAN:
                    case JenisPmks::ANAK_JALANAN:
                    case JenisPmks::PENYANDANG_DISABILITAS:
                    case JenisPmks::TERLANTAR:
                        if ($isDalamPanti) {
                            $additionalData = [
                                'lembaga_kesejahteraan_sosial_id' => LembagaKesejahteraanSosial::all()->random()->id
                            ];
                        } else {
                            $additionalData = [
                                'nama_keluarga' => $this->faker->name($this->faker->randomElement(['male', 'female'])),
                                'hubungan_keluarga' => $this->keluarga($pmks),
                            ];
                        }
                        switch ($jenisPmks->id) {
                            case JenisPmks::PENYANDANG_DISABILITAS:
                                $additionalData['jenis_disabilitas_id'] = JenisDisabilitas::all()->random()->id;
                                break;
                            case JenisPmks::KORBAN_KEKERASAN:
                                $additionalData['jenis_kekerasan_id'] = JenisKekerasan::all()->random()->id;
                                break;
                        }
                        break;


                    case JenisPmks::GELANDANGAN:
                    case JenisPmks::PENGEMIS:
                        if ($isDalamPanti) {
                            $additionalData = [
                                'lembaga_kesejahteraan_sosial_id' => LembagaKesejahteraanSosial::all()->random()->id
                            ];
                        }
                        break;


                    case JenisPmks::KORBAN_BENCANA_ALAM:
                    case JenisPmks::KORBAN_BENCANA_SOSIAL:
                        $additionalData = [
                            'tanggal_bencana' => $this->faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now')->format("Y-m-d"),
                            'jumlah_korban' => $this->faker->randomNumber(4, false),
                        ];
                        switch ($jenisPmks->nama) {
                            case JenisPmks::KORBAN_BENCANA_ALAM:
                                $additionalData['jenis_bencana_alam_id'] = JenisBencanaAlam::all()->random()->id;
                                break;
                            case JenisPmks::KORBAN_BENCANA_SOSIAL:
                                $additionalData['jenis_bencana_sosial_id'] = JenisBencanaSosial::all()->random()->id;
                                break;
                        }
                        break;


                    case JenisPmks::KOMUNITAS_ADAT_TERPENCIL:
                        $additionalData = [
                            'jumlah_laki' => $this->faker->randomNumber(4, false),
                            'jumlah_perempuan' => $this->faker->randomNumber(4, false),
                        ];
                        break;

                    case JenisPmks::ANAK_BERHADAPAN_HUKUM:
                        $additionalData = [
                            'status_hukum' => $this->faker->randomElement(['Tersangka', 'Pelaku', 'Tahanan', 'Narapidana']),
                        ];
                        break;
                }
                $arrAdditionalData[$jenisPmks->id] = $additionalData;
            }
            $pmks->jenisPmks()->sync($arrAdditionalData);
        });
    }

    private function keluarga(Pmks $pmks) : string {
        if ($pmks->isLansia()) {
            return $this->faker->randomElement([
                        'Anak',
                        'Keponakan',
                        'Tetangga',
                        'Cucu',
                        'Saudara',
                    ]);
        } else {
            return $this->faker->randomElement([
                        'Orang tua',
                        'Saudara',
                        'Orang tua asuh',
                        'Paman',
                        'Bibi',
                    ]);
        }
    }
}


/*
TODO:
- Kartu indonesia pintar nanti buat di state anak usia sekolah, random true/false
 */
