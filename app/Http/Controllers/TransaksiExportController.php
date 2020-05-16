<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_pesanan;

use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TransaksiExportController extends Controller
{
    public function index(){
    	$title = 'Kelola Pesanan';
    	$data = T_pesanan::get();

    	return view('transaksi-export.index',compact('title','data'));
    }

    public function export_excel()
    {
        return Excel::download(new TransaksiExport, 'Laporan-Pesanan.xlsx');
    }
}
