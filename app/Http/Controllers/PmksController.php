<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pmks\JenisPmks;
use App\Models\Pmks\Pmks;
use App\Models\Provinsi;
use App\Models\Psks\LembagaKesejahteraanSosial;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // $provinsi = \App\Models\Provinsi::with(['kabupatenKota', 'kabupatenKota.kecamatan', 'kabupatenKota.kecamatan.kelurahan'])->where('id', '51')->first();
        return view('pmks.create', [
            'provinsi' => \App\Models\Provinsi::all(),
            'kabupaten' => \App\Models\KabupatenKota::where('provinsi_id', '51')->get(),
            'kecamatan' => \App\Models\Kecamatan::where('kabupaten_kota_id', '51.71')->get(),
            'kelurahan' => \App\Models\Kelurahan::where('kecamatan_id', '51.71.02')->get(),
            'jenisPmks' => \App\Models\Pmks\JenisPmks::all(),
            'lembagaKs' => \App\Models\Psks\LembagaKesejahteraanSosial::all(),
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
        // dd($request);
        $this->validate($request,
            [
                'nik'           => 'max:16|unique:pmks',
                'kartu_keluarga'           => 'max:16|unique:pmks',
                'bpjs_kesehatan'           => 'max:13|unique:pmks',
                'nama'          => 'required|max:255',
                'tanggal_lahir' => 'required|date_format:d/m/Y',
            ]
        );
        $request->merge(['tanggal_lahir' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->format('Y-m-d')]);

        DB::transaction(function () use ($request) {
            $pmks = Pmks::create($request->except('_token'));
        });
        // dd($request->except('_token'));

        // try {
        //     $pmks = Pmks::create($request->except('_token'));
        // } catch (QueryException $e) {
        //     dd($request);
        // }

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
