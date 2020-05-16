<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paket;

use DataTables;
use Yajra\DataTables\Html\Builder;

class PaketController extends Controller
{
    public function index(Builder $builder){
        if (request()->ajax()) {
            return DataTables::of(Paket::query())->addColumn("action", function($data) {
                return "
                <a href='" . route("paket-laundry.edit", ["id" => $data->id]) . "' class='btn btn-warning btn-xs btn-edit' id='edit'><i class='fa fa-pencil-square-o'></i></a>
                <a href='" . route("paket-laundry.delete", ["id" => $data->id]) . "' class='btn btn-danger btn-xs btn-hapus' id='delete'><i class='fa fa-trash-o'></i></a>
                ";
            })->addIndexColumn()->toJson();
        }

    	$title = 'Paket Laundry';

        $html = $builder->columns([
                ['data' => 'nama', 'nama' => 'nama', 'title' => 'Nama Paket'],
                ['data' => 'harga', 'harga' => 'harga', 'title' => 'Harga'],
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
    	return view('paket.index',compact('title','html'));

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
