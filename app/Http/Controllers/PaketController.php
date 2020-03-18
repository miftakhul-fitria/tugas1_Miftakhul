<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paket;

class PaketController extends Controller
{
    public function index(){
    	$title = 'Paket Laundry';
    	$data = Paket::get(); //untuk menampung data paket laundry

    	return view('paket.index',compact('title','data'));

    }

    public function add(){
    	$title = 'Tambah Paket Laundry';

    	return view('paket.add',compact('title'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

    	$data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
    	$data['harga'] = $request->harga;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	//notifikasi
    	\Session::flash('sukses','Data Berhasil Ditambah');

    	Paket::insert($data);
    	return redirect('paket-laundry');
    }

    public function edit($id){
        $dt = Paket::find($id);
        $title = 'Edit Paket '.$dt->nama;

        return view('paket.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Paket::where('id',$id)->update($data);

        //notifikasi
        \Session::flash('sukses','Data Berhasil Di Update'); 
        
        return redirect('paket-laundry');       
    }

    public function delete($id){
        try {
            Paket::where('id',$id)->delete();

            //notifikasi
            \Session::flash('sukses','Data Berhasil Di Hapus'); 
        } catch (\Exception $e) {
            //notifikasi
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('paket-laundry');
    }
}
