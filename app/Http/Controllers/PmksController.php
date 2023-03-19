<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks\JenisPmks;
use App\Models\Pmks\Pmks;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PmksController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $model = PMKS::with([
                'kabupatenKota',
                'jenisPmks',
            ])->select('pmks.*');

            if ($request->input('search-nama')) {
                $model->where('nama', 'like', "%{$request->input('search-nama')}%");
            }
            if ($request->input('search-nik')) {
                $model->where('nik', 'like', "%{$request->input('search-nik')}%");
            }
            if ($request->input('search-kabupaten')) {
                $model->whereIn('kabupaten_kota_id', $request->input('search-kabupaten'));
            }
            if ($request->input('search-jenis-pmks')) {
                $model->whereHas('jenisPmks', function($q) use ($request) {
                   $q->whereIn('jenis_pmks_id', $request->input('search-jenis-pmks')); 
               });
            }

            return DataTables::eloquent($model)
            ->addIndexColumn()
            ->setRowId('id')
            ->make(true);
        }

        return view('pmks.index', [
            'kabupaten' => \App\Models\KabupatenKota::where('provinsi_id', '51')->get(),
            'jenis_pmks' => \App\Models\Pmks\JenisPmks::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = \App\Models\Provinsi::with(['kabupatenKota', 'kabupatenKota.kecamatan', 'kabupatenKota.kecamatan.kelurahan'])->where('id', '51')->first();
        return view('pmks.create', [
            'provinsi' => \App\Models\Provinsi::all(),
            'bali' => $provinsi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'nik'       => 'required|max:16|unique:pmks',
                'kartu_keluarga'       => 'required|max:16',
                'bpjs_kesehatan'       => 'required|max:13|unique:pmks',
                'nama'       => 'required|max:255|unique:pmks',
            ],
            ['year.date_format' => 'Masukkan tahun yang valid']
        );

        $pmks = Pmks::create($request->except('_token'));
        return redirect(route('pmks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pmks\Pmks  $pmks
     * @return \Illuminate\Http\Response
     */
    public function show(Pmks $pmks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pmks\Pmks  $pmks
     * @return \Illuminate\Http\Response
     */
    public function edit(Pmks $pmks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pmks\Pmks  $pmks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pmks $pmks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pmks\Pmks  $pmks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pmks $pmks)
    {
        //
    }
}
