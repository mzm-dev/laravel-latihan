<?php

namespace App\Http\Controllers;

use App\Models\Jawatan;
use Illuminate\Http\Request;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Select berserta pagination
        $jawatanArray = Jawatan::paginate(5);
        //$jawatanArray = Jawatan::simplePaginate(5);

        return view('jawatan.index',compact('jawatanArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jawatan.create');
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
        Jawatan::create($request->all());

        return redirect()
            ->route('jawatan.index')
            ->with('success','Maklumat jawatan telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jawatan $jawatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawatan $jawatan)
    {
        return view('jawatan.edit', compact('jawatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawatan $jawatan)
    {
        //update data form jawatan
        $jawatan->update($request->all());

        return redirect()
            ->route('jawatan.index')
            ->with('success','Maklumat jawatan telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawatan $jawatan)
    {
        //delete rekod bagi id yg di pilih
        $jawatan->delete();

        return redirect()
        ->route('jawatan.index')
        ->with('success','Maklumat jawatan telah berjaya dihapuskan');
    }
}
