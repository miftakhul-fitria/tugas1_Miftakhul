<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StatusPembayaran;

use DataTables;
use Yajra\DataTables\Html\Builder;

class StatusPembayaranController extends Controller
{
    public function index(Builder $builder){
        if (request()->ajax()) {
            return DataTables::of(StatusPembayaran::query())->addColumn("action", function($data) {
                return "
                <a href='" . route("status-pembayaran.edit", ["id" => $data->id]) . "' class='btn btn-warning btn-xs btn-edit' id='edit'><i class='fa fa-pencil-square-o'></i></a>
                <a href='" . route("status-pembayaran.delete", ["id" => $data->id]) . "' class='btn btn-danger btn-xs btn-hapus' id='delete'><i class='fa fa-trash-o'></i></a>
                ";
            })->addIndexColumn()->toJson();
        }

        $title = 'Master Data Status Pembayaran';
        $html = $builder->columns([
            ['data' => 'nama', 'nama' => 'nama', 'title' => 'Nama'],
            ['data' => 'urutan', 'urutan' => 'urutan', 'title' => 'Urutan'],
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
    	
    	return view('status-pembayaran.index',compact('title','html'));

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
        return redirect('status-pembayaran');
    }
}