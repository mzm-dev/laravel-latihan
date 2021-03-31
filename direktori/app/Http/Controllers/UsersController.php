<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Select berserta pagination
        $userArray = User::paginate(5);
        //$userArray = User::simplePaginate(5);

        return view('user.index', compact('userArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:8|confirmed',
        ], [
            'required' => ':attribute diperlukan.',
            'unique' => ':attribute telah wujud.',
            'min' => ':attribute minima 3 aksara.',
        ], [
            'nama' => 'Nama User'
        ]);

        //$request->except(['status']);//remove requst fields
        //$request->merge(['tarikh'=>date('Y-m-d')]);//insert requst fields
        //Save data dari form
        $request->merge(['password' => Hash::make($request->password)]); //insert requst fields
        User::create($request->all());

        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|max:8|confirmed',
        ], [
            'required' => ':attribute diperlukan.',
            'unique' => ':attribute telah wujud.',
            'min' => ':attribute minima 3 aksara.',
        ], [
            'nama' => 'Nama Pengguna'
        ]);

        if ($request->has('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        //update data form user
        $user->update($request->all());

        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya dihapuskan');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function pengesahan(Request $request, User $user)
    {

        $request->merge(['email_verified_at' => now()]);

        //update data form user
        $user->update($request->all());

        return redirect()
            ->route('user.index')
            ->with('success', 'Maklumat user telah berjaya disahkan.');
    }
}
