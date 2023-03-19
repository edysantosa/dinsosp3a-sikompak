<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function kabupaten(Request $request)
    {
        sleep(2);
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




        //  $x = \App\Models\Provinsi::with(['kabupatenKota', 'kabupatenKota.kecamatan', 'kabupatenKota.kecamatan.kelurahan'])->where('id', '51')->first();
        // return view('pmks.create', [
        //     'provinsi' => \App\Models\Provinsi::all(),
        //     'bali' => $provinsi,
        // ]);
    }
}
