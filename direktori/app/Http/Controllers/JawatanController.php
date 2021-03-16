<?php

namespace App\Http\Controllers;

use App\Models\Jawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatanArray = Jawatan::paginate();

        return view('jawatan/index', compact('jabatanArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jawatan/create');
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
        Jawatan::create($request->all());

        //redirect to jawatan list
        return Redirect::route('jawatan.index')->with('success','Maklumat jawatan telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jawatan $jawatan)
    {
        return view('jawatan/show', compact('jawatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawatan $jawatan)
    {
        return view('jawatan/edit', compact('jawatan'));
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
        //Check value of aktif
        $request->merge([
            'aktif' => $request->aktif ?? 0
        ]);

        //Update all input data
        $jawatan->update($request->all());

        //redirect to jawatan list
        return Redirect::route('jawatan.index')->with('success', 'Maklumat jawatan telah berjaya dikemaskini');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jawatan  $jawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawatan $jawatan)
    {
        //Delete selected data jawatan
        $jawatan->delete();

        //redirect to jawatan list
        return Redirect::route('jawatan.index')->with('success','Maklumat jawatan telah berjaya dihapuskan');
    }

}
