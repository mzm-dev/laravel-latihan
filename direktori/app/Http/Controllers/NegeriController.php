<?php

namespace App\Http\Controllers;

use App\Models\Negeri;
use Illuminate\Http\Request;

class NegeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Select berserta pagination
        $negeriArray = Negeri::paginate(5);
        //$negeriArray = Negeri::simplePaginate(5);

        return view('negeri.index',compact('negeriArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('negeri.create');
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
            'nama' => 'required|min:3|unique:negeri',
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[
            'nama'=>'Nama Negeri'
        ]);

        //$request->except(['status']);//remove requst fields
        //$request->merge(['tarikh'=>date('Y-m-d')]);//insert requst fields
        //Save data dari form
        Negeri::create($request->all());

        return redirect()
            ->route('negeri.index')
            ->with('success','Maklumat negeri telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function show(Negeri $negeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Negeri $negeri)
    {
        return view('negeri.edit', compact('negeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negeri $negeri)
    {
        $request->validate([
            'nama' => 'required|min:3|unique:negeri,nama,'.$negeri->id,
        ],[
            'required'=>':attribute diperlukan.',
            'unique'=>':attribute telah wujud.',
            'min'=>':attribute minima 3 aksara.',
        ],[
            'nama'=>'Nama Negeri'
        ]);

        //update data form negeri
        $negeri->update($request->all());

        return redirect()
            ->route('negeri.index')
            ->with('success','Maklumat negeri telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negeri  $negeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negeri $negeri)
    {
        $negeri->delete();

        return redirect()
        ->route('negeri.index')
        ->with('success','Maklumat negeri telah berjaya dihapuskan');
    }
}
