<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
    	$title = 'Halaman Customer';
    	$data = Customer::orderBy('nama','asc')->get(); //untuk menampung data customer

    	return view('customer.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah Customer';

    	return view('customer.add',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

    	$data['id'] = \Uuid::generate(4);
    	$data['email'] = $request->email;
    	$data['nama'] = $request->nama;
    	$data['no_hp'] = $request->no_hp;
    	$data['alamat'] = $request->alamat;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	//notifikasi
    	\Session::flash('sukses','Data Customer Berhasil Ditambah');

    	Customer::insert($data);
    	return redirect('customer');
    }

    public function edit($id){
        $dt = Customer::find($id);
        $title = 'Edit Customer '.$dt->nama;

        return view('customer.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $data['email'] = $request->email;
    	$data['nama'] = $request->nama;
    	$data['no_hp'] = $request->no_hp;
    	$data['alamat'] = $request->alamat;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customer::where('id',$id)->update($data);

        //notifikasi
        \Session::flash('sukses','Data Berhasil Di Update'); 
        
        return redirect('customer');       
    }

    public function delete($id){
        try {
            Customer::where('id',$id)->delete();

            //notifikasi
            \Session::flash('sukses','Data Berhasil Di Hapus'); 
        } catch (\Exception $e) {
            //notifikasi
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('customer');
    }
}
