<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use DataTables;
use Yajra\DataTables\Html\Builder;

class CustomerController extends Controller
{
    public function index(Builder $builder){
         if (request()->ajax()) {
            return DataTables::of(Customer::query())->addColumn("action", function($data) {
                return "
                <a href='" . route("customer.edit", ["id" => $data->id]) . "' class='btn btn-warning btn-xs btn-edit' id='edit'><i class='fa fa-pencil-square-o'></i></a>
                <a href='" . route("customer.delete", ["id" => $data->id]) . "' class='btn btn-danger btn-xs btn-hapus' id='delete'><i class='fa fa-trash-o'></i></a>
                ";
            })->addIndexColumn()->toJson();
        }

        $title = 'Halaman Customer';
        $html = $builder->columns([
                ['data' => 'DT_RowIndex', 'nama' => '#', 'title' => '#', 'defaultContent' => '', 'orderable' => false],
                ['data' => 'email', 'email' => 'email', 'title' => 'Email'],
                ['data' => 'nama', 'nama' => 'nama', 'title' => 'Nama'],
                ['data' => 'no_hp', 'no_hp' => 'no_hp', 'title' => 'No HP'],
                ['data' => 'alamat', 'alamat' => 'alamat', 'title' => 'Alamat'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
                [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'ACTION',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],
            ]);
    	return view('customer.index',compact('title','html'));
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
