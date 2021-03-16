<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Jawatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Select berserta pagination
        $pegawaiArray = Pegawai::paginate(5);
        //$pegawaiArray = Pegawai::simplePaginate(5);

        return view('pegawai.index',compact('pegawaiArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Select dropdown
        $jawatan = Jawatan::pluck('nama','id');
        $jabatan = Jabatan::pluck('nama','id');

        return view('pegawai.create', compact('jawatan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save data dari form

        //$request->except(['status']);//remove requst fields
        //$request->merge(['tarikh'=>date('Y-m-d')]);//insert requst fields
        Pegawai::create($request->all());

        return redirect()
            ->route('pegawai.index')
            ->with('success','Maklumat pegawai telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {

        $jawatan = Jawatan::pluck('nama','id');
        $jabatan = Jabatan::pluck('nama','id');

        return view('pegawai.edit', compact('pegawai','jawatan','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //update data form pegawai
        $pegawai->update($request->all());

        return redirect()
            ->route('pegawai.index')
            ->with('success','Maklumat pegawai telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()
        ->route('pegawai.index')
        ->with('success','Maklumat pegawai telah berjaya dihapuskan');
    }
}
