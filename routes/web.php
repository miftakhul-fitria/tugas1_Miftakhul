<?php

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

Route::get('/', function () { //Daftar URL register
    return view('welcome'); //Mengarahkan URL ke halaman register, halaman ada di dalam resources/views/register.blade.php
});
