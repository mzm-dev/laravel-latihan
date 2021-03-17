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
     *
     * 'regex:/^.+\.(gov\.my|com\.my|my|com)$/' 
     * @ns.gov.my
     * @kpkt.gov.my
     * @com.my
     * @my
     * @com
     */
    public function store(Request $request)
    {
    	//Kod Negeri
    	//https://www.jpn.gov.my/my/kod-negeri

    	//Email Validation
    	// 'regex:/^.+\.(gov\.my|com\.my|my|com)$/' 
	    // @ns.gov.my
	    // @kpkt.gov.my
	    // @com.my
	    // @my
	    // @com
    	
		$request->validate([            
		    'nama' => ['required','min:3', 'regex:/[a-zA-Z @\/\'`]+$/','unique:pegawai'],
		    'nokp' => ['required', 'regex:/^(\d{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3(0|1))\d{2}\d{4})$/','unique:pegawai']
		    'emel' => ['required','regex:/^.+\.(gov\.my)$/','unique:pegawai'],
		    'negeri_id' => 'required',
		    'daerah_id' => 'required',
		    'jawatan_id' => 'required',
		    'jabatan_id' => 'required',
		    'no_telefon_pejabat' => ['required', 'regex:/^[0|1][0-9]\d{7,9}$/'],
		    'no_telefon_bimbit' => ['nullable', 'regex:/^[0|1][0-9]\d{7,9}$/'],
		],[
		    'required'=>':attribute diperlukan.',
		    'required.negeri_id'=>'Sila buat pilihan :attribute.',
		    'unique'=>':attribute telah wujud.',
		    'min'=>':attribute terlalu ringkas, minima 3 aksara.',
		    'regex'=>':attribute format tidak sah.',            
		    'regex.emel'=>':attribute rasmi sahaja.',
		],[
		    'nama'=>'Nama Pegawai',
		    'nokp'=>'No Kad Pengenalan',
		    'emel'=>'Alamat E-mel',
		    'negeri_id'=>'Negeri',
			'daerah_id'=>'Daerah',
			'jawatan_id'=>'Jawatan',
			'jabatan_id'=>'Jabatan',
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
		    'nama' => ['required','min:3', 'regex:/[a-zA-Z @\/\'`]+$/','unique:pegawai,nama,'.$pegawai->id],
		    'nokp' => ['required', 'regex:/^(\d{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3(0|1))\d{2}\d{4})$/','unique:pegawai,nokp,'.$pegawai->id]
		    'emel' => ['required','regex:/^.+\.(gov\.my)$/','unique:pegawai,emel,'.$pegawai->id],
		    'negeri_id' => 'required',
		    'daerah_id' => 'required',
		    'jawatan_id' => 'required',
		    'jabatan_id' => 'required',
		    'no_telefon_pejabat' => ['required', 'regex:/^[0|1][0-9]\d{7,9}$/'],
		    'no_telefon_bimbit' => ['nullable', 'regex:/^[0|1][0-9]\d{7,9}$/'],
		],[
		    'required'=>':attribute diperlukan.',
		    'required.negeri_id'=>'Sila buat pilihan :attribute.',
		    'unique'=>':attribute telah wujud.',
		    'min'=>':attribute terlalu ringkas, minima 3 aksara.',
		    'regex'=>':attribute format tidak sah.',            
		    'regex.emel'=>':attribute rasmi sahaja.',
		],[
		    'nama'=>'Nama Pegawai',
		    'nokp'=>'No Kad Pengenalan',
		    'emel'=>'Alamat E-mel',
		    'negeri_id'=>'Negeri',
			'daerah_id'=>'Daerah',
			'jawatan_id'=>'Jawatan',
			'jabatan_id'=>'Jabatan',
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
