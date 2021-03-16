<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatanArray = Jabatan::paginate();

        return view('jabatan/index', compact('jabatanArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save all input data
        Jabatan::create($request->all());

        //redirect to jabatan list
        return Redirect::route('jabatan.index')->with('success','Maklumat jawatan telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        return view('jabatan/show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan/edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //Check value of aktif
        $request->merge([
            'aktif' => $request->aktif ?? 0
        ]);

        //Update all input data
        $jabatan->update($request->all());

        //redirect to jabatan list
        return Redirect::route('jabatan.index')->with('success', 'Maklumat jawatan telah berjaya dikemaskini');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //Delete selected data jabatan
        $jabatan->delete();

        //redirect to jabatan list
        return Redirect::route('jabatan.index')->with('success','Maklumat jawatan telah berjaya dihapuskan');
    }

}
