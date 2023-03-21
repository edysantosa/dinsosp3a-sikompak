<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function kabupaten(Request $request)
    {
        if ($request->has('provinsi_id')) {
            $kabupaten = KabupatenKota::where('provinsi_id', $request->input('provinsi_id'))->get();
            return response()->json([
                'kabupaten' => $kabupaten,
            ]);
        } else {
            return response()->json([
                'message' => 'Parameter yang digunakan salah atau tidak ada',
                'error' => 500,
            ], 500);
        }
    }

    public function kecamatan(Request $request)
    {
        if ($request->has('kabupaten_kota_id')) {
            $kecamatan = Kecamatan::where('kabupaten_kota_id', $request->input('kabupaten_kota_id'))->get();
            return response()->json([
                'kecamatan' => $kecamatan,
            ]);
        } else {
            return response()->json([
                'message' => 'Parameter yang digunakan salah atau tidak ada',
                'error' => 500,
            ], 500);
        }
    }

    public function kelurahan(Request $request)
    {
        if ($request->has('kecamatan_id')) {
            $kelurahan = Kelurahan::where('kecamatan_id', $request->input('kecamatan_id'))->get();
            return response()->json([
                'kelurahan' => $kelurahan,
            ]);
        } else {
            return response()->json([
                'message' => 'Parameter yang digunakan salah atau tidak ada',
                'error' => 500,
            ], 500);
        }
    }
}
