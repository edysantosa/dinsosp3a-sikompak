<?php

namespace App\Http\Controllers;

use App\Models\Pmks\Pmks;
use Illuminate\Http\Request;

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
            return DataTables::eloquent(
                PMKS::query()
            )
            ->addIndexColumn()
            ->setRowId('id')
            ->make(true);
        }

        return view('pmks.index', [
            'kabupaten' => \App\Models\KabupatenKota::where('provinsi_id', '51')->get(),
            'kabupaten' => \App\Models\KabupatenKota::where('provinsi_id', '51')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
