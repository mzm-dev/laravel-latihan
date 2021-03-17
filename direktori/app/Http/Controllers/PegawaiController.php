<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\Jabatan;
use App\Models\Jawatan;
use App\Models\Negeri;
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
        $negeri = Negeri::pluck('nama','id');
        $daerah = Daerah::pluck('nama','id');

        return view('pegawai.create', compact('jawatan','jabatan','negeri','daerah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|unique:pegawai',
            'nokp' => 'required|unique:pegawai',
            'emel' => 'required|email|unique:pegawai',
            'negeri_id' => 'required',
            'daerah_id' => 'required',
            'jawatan_id' => 'required',
            'jabatan_id' => 'required',
            'no_telefon_pejabat' => ['required', 'regex:/^[0|1][0-9]\d{7,9}$/'],
            'no_telefon_bimbit' => ['nullable', 'regex:/^[0|1][0-9]\d{7,9}$/'],
        ],[
            'required'=>':attribute diperlukan.',
            'required.negeri_id'=>'Sila buat pilihan :attribute.',
            'required.daerah_id'=>'Sila buat pilihan :attribute.',
            'required.jawatan_id'=>'Sila buat pilihan :attribute.',
            'required.jabatan_id'=>'Sila buat pilihan :attribute.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
            'regex'=>':attribute format tidak sah.',
        ],[
            'nama'=>'Nama Jawatan',
            'nokp'=>'No Kad Pengenalan',
            'emel'=>'Alamat E-mel',
            'negeri_id'=>'Negeri',
        ]);

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
        return view('pegawai.show',compact('pegawai'));
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
        $negeri = Negeri::pluck('nama','id');
        $daerah = Daerah::pluck('nama','id');

        return view('pegawai.edit', compact('pegawai','jawatan','jabatan','negeri','daerah'));
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

        $request->validate([
            'nama' => 'required|min:3|unique:pegawai,nama,'.$pegawai->id,
            'nokp' => 'required|unique:pegawai,nokp,'.$pegawai->id,
            'emel' => 'required|email|unique:pegawai,emel,'.$pegawai->id,
            'no_telefon_pejabat' => ['required', 'regex:/^[0|1][0-9]\d{7,9}$/'],
            'no_telefon_bimbit' => ['nullable', 'regex:/^[0|1][0-9]\d{7,9}$/'],
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
            'email'=>':attribute tidak sah.',
            'regex'=>':attribute format tidak sah.',
        ],[
            'nama'=>'Nama Jawatan',
            'nokp'=>'No Kad Pengenalan',
            'emel'=>'Alamat E-mel',
        ]);

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
