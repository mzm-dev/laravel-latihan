<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawaiArray = Pegawai::paginate();

        return view('pegawai/index', compact('pegawaiArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai/create');
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
        Pegawai::create($request->all());

        //redirect to pegawai list
        return Redirect::route('pegawai.index')->with('success', 'Maklumat pegawai telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai/show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai/edit', compact('pegawai'));
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

        if ($request->only('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();

            //Store Image in Public Folder
            //public/images/file.png
            #$request->image->move(public_path('emej'), $imageName);

            //Store Image in Storage Folder
            //storage/app/images/file.png
            $request->avatar->storeAs('public/images', $imageName);

            $request->merge([
                'imej' => $imageName
            ]);
        }
        //Check value of aktif
        $request->merge([
            'aktif' => $request->aktif ?? 0
        ]);

        //Update all input data
        $pegawai->update($request->all());

        //redirect to pegawai list
        return Redirect::route('pegawai.index')->with('success', 'Maklumat pegawai telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //Delete selected data pegawai
        $pegawai->delete();

        //redirect to pegawai list
        return Redirect::route('pegawai.index')->with('success', 'Maklumat pegawai telah berjaya dihapuskan');
    }
}
