<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NamaUsaha;

class ProfileController extends Controller
{
    public function index(){
    	$title = 'Manage Nama Usaha';
    	$dt = NamaUsaha::first();

    	return view('nama_usaha.index',compact('title','dt'));
    }

    public function update(Request $request){
    	try {
    		// NamaUsaha::update($data);
    		$dt = NamaUsaha::first();
    		$dt->id = \Uuid::generate(4);
    		$dt->nama = $request->nama;
    		$dt->created_at = date('Y-m-d H:i:s');
    		$dt->updated_at = date('Y-m-d H:i:s');
    		$dt->save();

    		\Session::flash('sukses','Data berhasil di update');
    	} catch (\Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect()->back();
    }
}
