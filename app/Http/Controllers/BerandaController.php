<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
    	$title= 'Beranda Admin';

    	return view('beranda.index',compact('title'));
    }
}
