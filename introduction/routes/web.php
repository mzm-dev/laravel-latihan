<?php

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

Route::get('/', function () {
    //resources/views/<nama_file>.blade.php
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    //resources/views/<nama_file>.blade.php
    return view('home');
})->name('home');

Route::get('/pengguna-utama', function () {
    //resources/views/pengguna/<nama_file>.blade.php
    return view('pengguna/utama');
})->name('pengguna.utama');

Route::get('/variables/string-compact', function () {
    //resources/views/variables/<nama_file>.blade.php

    $name = "Yusri";
    $umur = "40";

    return view('variables/stringCompact', compact('name','umur'));

})->name('variables.stringCompact');

Route::get('/variables/string-array', function () {
    //resources/views/variables/<nama_file>.blade.php

    $name = "Yusri";
    $umur = "40";

    return view('variables/stringArray', ['name'=>$name, 'age'=>$umur]);
    //return view('variables/stringtwo', array('name'=>$name, 'age'=>$umur));

})->name('variables.stringArray');
