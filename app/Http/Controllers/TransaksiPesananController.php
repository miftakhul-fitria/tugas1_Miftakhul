<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Paket;
use App\Models\StatusPesanan;
use App\Models\StatusPembayaran;
use App\Models\T_pesanan;
use App\Models\NamaUsaha;

use PDF;

use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TransaksiPesananController extends Controller
{
    public function index(){
    	$title = 'Transaksi Pesanan';
    	$data = T_pesanan::orderBy('created_at','desc')->get(); //untuk menampung data transaksi pesanan

    	return view('transaksi-pesanan.index',compact('title','data'));
    }

    public function export_excel()
    {
        return Excel::download(new TransaksiExport, 'Data-Transaksi-Pesanan.xlsx');
    }

    public function periode(Request $request){
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;

            $title = "Transaksi Pesanan dari $dari sampai $sampai";

            $data = T_pesanan::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->orderBy('created_at','desc')->get();

            return view('transaksi-pesanan.index',compact('title','data'));
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function export($id){
        try {
            $dt = T_pesanan::find($id);
            $nama_usaha = NamaUsaha::first();

            $pdf = PDF::loadView('transaksi-pesanan.pdf',['dt'=>$dt, 'nama_usaha'=>$nama_usaha]);
            return $pdf->download('transaksi-pesanan.pdf');
        } catch (\Exception $e) {
            //notifikasi
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function naikkan_status($id){
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pesanan;
            $urutan_status = $transaksi->status_pesanans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = StatusPesanan::where('urutan',$urutan_baru)->first();

            T_pesanan::where('id',$id)->update([
                'status_pesanan'=> $status_baru->id
            ]);

            \Session::flash('sukses','Status Pesanan Berhasil Dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function naikkan_pembayaran($id){
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = StatusPembayaran::where('urutan',$urutan_baru)->first();

            T_pesanan::where('id',$id)->update([
                'status_pembayaran'=> $status_baru->id
            ]);

            \Session::flash('sukses','Status Pembayaran Berhasil Dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function add(){
    	$title = 'Tambah Transaksi Pesanan';
    	$customer = Customer::orderBy('nama','asc')->get();
    	$paket = Paket::orderBy('nama','asc')->get();
    	$status_pesanan = StatusPesanan::orderBy('urutan','asc')->get();
    	$status_pembayaran = StatusPembayaran::orderBy('nama','asc')->get();

    	return view('transaksi-pesanan.add',compact('title','customer','paket','status_pesanan','status_pembayaran'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'customer' => 'required',
            'paket' => 'required',
            'berat' => 'required',
            'status_pesanan' => 'required',
            'status_pembayaran' => 'required'
        ]);

    	$data['id'] = \Uuid::generate(4);
    	$data['customer'] = $request->customer;
    	$data['paket'] = $request->paket;
    	$data['berat'] = $request->berat;
    	$data['status_pesanan'] = $request->status_pesanan;
    	$data['status_pembayaran'] = $request->status_pembayaran;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	$harga = Paket::find($request->paket);
    	$harga_paket = $harga->harga;
    	$berat = $request->berat;

    	$grand_total = $harga_paket * $berat;

    	$data['grand_total'] = $grand_total;

    	//notifikasi
    	\Session::flash('sukses','Transaksi Berhasil Ditambah');

    	T_pesanan::insert($data);
    	return redirect('transaksi-pesanan');
    }

    public function edit($id){
        $dt = T_pesanan::find($id);
        $title = 'Edit Transaksi Pesanan '.$dt->nama;
        $customer = Customer::orderBy('nama','asc')->get();
    	$paket = Paket::orderBy('nama','asc')->get();
    	$status_pesanan = StatusPesanan::orderBy('urutan','asc')->get();
    	$status_pembayaran = StatusPembayaran::orderBy('nama','asc')->get();

        return view('transaksi-pesanan.edit',compact('title','customer','paket','status_pesanan','status_pembayaran','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'customer' => 'required',
            'paket' => 'required',
            'berat' => 'required',
            'status_pesanan' => 'required',
            'status_pembayaran' => 'required'
        ]);

    	$data['customer'] = $request->customer;
    	$data['paket'] = $request->paket;
    	$data['berat'] = $request->berat;
    	$data['status_pesanan'] = $request->status_pesanan;
    	$data['status_pembayaran'] = $request->status_pembayaran;
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	$harga = Paket::find($request->paket);
    	$harga_paket = $harga->harga;
    	$berat = $request->berat;

    	$grand_total = $harga_paket * $berat;

    	$data['grand_total'] = $grand_total;

    	//notifikasi
    	\Session::flash('sukses','Transaksi Berhasil Di Update');

    	T_pesanan::where('id',$id)->update($data);
    	return redirect('transaksi-pesanan');   
    }

    public function delete($id){
        T_pesanan::where('id',$id)->delete();

        //notifikasi
        \Session::flash('sukses','Transaksi Berhasil Di Hapus'); 
        return redirect('transaksi-pesanan');
    }
}
