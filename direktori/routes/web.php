<?php

use App\Http\Controllers\DaerahController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JawatanController;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\PegawaiController;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/', function (Request $request) {

        if ($request->has('keyword')) {
            $request->validate([
                'keyword' => 'nullable|min:3|max:255|regex:/(^[A-Za-z0-9\/\- ]+$)+/'
            ]);
        }
        if ($request->has('jabatan')) {
            $request->validate([
                'jabatan' => 'nullable|regex:/(^[0-9]+$)+/'
            ]);
        }

        $pegawaiArray = Pegawai::with('jabatan', 'jawatan')
            ->when($request->keyword, function ($q) use ($request) { //Bila ada keyword
                $q->where(function ($query) use ($request) {
                    $query->whereRaw('lower(nama) regexp lower(?)', [str_replace(" ", "|", filter_var($request->keyword, FILTER_SANITIZE_SPECIAL_CHARS))]);
                });
            })

            ->when($request->jabatan, function ($q) use ($request) { //Bila ada jabatan
                $q->where(function ($query) use ($request) {
                    $query->where('jabatan_id', $request->jabatan);
                });
            })
            ->paginate();

        $pegawaiArray->appends($request->only('keyword', 'jabatan'));
        $jabatan = Jabatan::pluck('nama', 'id');

        return view('home', compact('pegawaiArray', 'jabatan'));
    })->name('home');

    Route::resource('jawatan', JawatanController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('daerah', DaerahController::class);
});

Route::resource('negeri', NegeriController::class)->middleware(['auth']);
