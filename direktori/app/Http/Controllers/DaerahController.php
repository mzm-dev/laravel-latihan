<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Select berserta pagination
        $daerahArray = Daerah::paginate(5);
        //$daerahArray = Daerah::simplePaginate(5);

        return view('daerah.index',compact('daerahArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daerah.create');
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

        $request->validate([
            'nama' => 'required|min:3|unique:daerah',
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[
            'nama'=>'Nama Daerah'
        ]);

        //$request->except(['status']);//remove requst fields
        //$request->merge(['tarikh'=>date('Y-m-d')]);//insert requst fields
        Daerah::create($request->all());

        return redirect()
            ->route('daerah.index')
            ->with('success','Maklumat daerah telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function show(Daerah $daerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function edit(Daerah $daerah)
    {
        return view('daerah.edit', compact('daerah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daerah $daerah)
    {

        $request->validate([
            'nama' => 'required|min:3|unique:daerah,nama,'.$daerah->id,
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[
            'nama'=>'Nama Daerah'
        ]);

        //update data form daerah
        $daerah->update($request->all());

        return redirect()
            ->route('daerah.index')
            ->with('success','Maklumat daerah telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daerah  $daerah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daerah $daerah)
    {
        $daerah->delete();

        return redirect()
        ->route('daerah.index')
        ->with('success','Maklumat daerah telah berjaya dihapuskan');
    }
}
