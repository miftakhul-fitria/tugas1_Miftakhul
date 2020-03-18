<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StatusPesanan;

class StatusPesananController extends Controller
{
    public function index(){
    	$title = 'Master Data Status Pesanan';
    	$data = StatusPesanan::get(); //untuk menampung data status pesanan

    	return view('status-pesanan.index',compact('title','data'));

    }

    public function add(){
    	$title = 'Tambah Status Pesanan';

    	return view('status-pesanan.add',compact('title'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'urutan' => 'required'
        ]);

    	$data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
    	$data['urutan'] = $request->urutan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	//notifikasi
    	\Session::flash('sukses','Data Berhasil Ditambah');

    	StatusPesanan::insert($data);
    	return redirect('status-pesanan');
    }

    public function edit($id){
        $dt = StatusPesanan::find($id);
        $title = 'Edit Status Pesanan '.$dt->nama;

        return view('status-pesanan.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nama' => 'required',
            'urutan' => 'required'
        ]);

        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatusPesanan::where('id',$id)->update($data);

        //notifikasi
        \Session::flash('sukses','Data Berhasil Di Update'); 
        
        return redirect('status-pesanan');       
    }

    public function delete($id){
        try {
            StatusPesanan::where('id',$id)->delete();

            //notifikasi
            \Session::flash('sukses','Data Berhasil Di Hapus'); 
        } catch (\Exception $e) {
            //notifikasi
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('paket-laundry');
    }

}
