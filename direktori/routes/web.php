<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JawatanController;
use App\Http\Controllers\PegawaiController;
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

Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('jabatan', JabatanController::class)->names('jabatan');
Route::resource('jawatan', JawatanController::class)->names('jawatan');
Route::resource('pegawai', PegawaiController::class)->names('pegawai');

