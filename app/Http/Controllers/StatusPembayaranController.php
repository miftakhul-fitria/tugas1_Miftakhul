<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StatusPembayaran;

class StatusPembayaranController extends Controller
{
    public function index(){
    	$title = 'Master Data Status Pembayaran';
    	$data = StatusPembayaran::get(); //untuk menampung data status pembayaran

    	return view('status-pembayaran.index',compact('title','data'));

    }

    public function add(){
    	$title = 'Tambah Status Pembayaran';

    	return view('status-pembayaran.add',compact('title'));
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

    	StatusPembayaran::insert($data);
    	return redirect('status-pembayaran');
    }

    public function edit($id){
        $dt = StatusPembayaran::find($id);
        $title = 'Edit Status Pembayaran '.$dt->nama;

        return view('status-pembayaran.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nama' => 'required',
            'urutan' => 'required'
        ]);

        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['updated_at'] = date('Y-m-d H:i:s');

        StatusPembayaran::where('id',$id)->update($data);

        //notifikasi
        \Session::flash('sukses','Data Berhasil Di Update'); 
        
        return redirect('status-pembayaran');       
    }

    public function delete($id){
        try {
            StatusPembayaran::where('id',$id)->delete();

            //notifikasi
            \Session::flash('sukses','Data Berhasil Di Hapus');
        } catch (\Exception $e) {
            //notifikasi
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('paket-laundry');
    }
}