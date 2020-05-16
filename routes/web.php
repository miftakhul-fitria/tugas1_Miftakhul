<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('charts');
});

//Halaman ini hanya boleh di akses oleh orang yg sudah login
Route::group(['middleware'=>'auth'],function(){
	//Ketika user mengakses route group tanpa login, maka nanti akan di direct ke halaman login
	Route::get('beranda','BerandaController@index');

	Route::get('paket-laundry','PaketController@index'); //menampilkan data paket laundry
	//add
	Route::get('paket-laundry/add','PaketController@add'); //menampilkan form add
	Route::post('paket-laundry/add','PaketController@store'); //logika add ke table

	//edit
	Route::get('paket-laundry/{id}','PaketController@edit')
	->name("paket-laundry.edit");
	Route::put('paket-laundry/{id}','PaketController@update')
	->name("paket-laundry.update");

	//delete
	Route::delete('paket-laundry/{id}','PaketController@delete')
	->name("paket-laundry.delete");

	//customer
	Route::get('customer','CustomerController@index');
	Route::get('customer/add','CustomerController@add');
	Route::post('customer/add','CustomerController@store');

	Route::get('customer/{id}','CustomerController@edit')
	->name("customer.edit");
	Route::put('customer/{id}','CustomerController@update')
	->name("customer.update");

	Route::delete('customer/{id}','CustomerController@delete')
	->name("customer.delete");

	//status pesanan
	Route::get('status-pesanan','StatusPesananController@index');
	Route::get('status-pesanan/add','StatusPesananController@add');
	Route::post('status-pesanan/add','StatusPesananController@store');

	Route::get('status-pesanan/{id}','StatusPesananController@edit')
	->name("status-pesanan.edit");
	Route::put('status-pesanan/{id}','StatusPesananController@update')
	->name("status-pesanan.update");

	Route::delete('status-pesanan/{id}','StatusPesananController@delete')->name("status-pesanan.delete");

	//status pembayaran
	Route::get('status-pembayaran','StatusPembayaranController@index');
	Route::get('status-pembayaran/add','StatusPembayaranController@add');
	Route::post('status-pembayaran/add','StatusPembayaranController@store');

	Route::get('status-pembayaran/{id}','StatusPembayaranController@edit')
	->name("status-pembayaran.edit");
	Route::put('status-pembayaran/{id}','StatusPembayaranController@update')
	->name("status-pembayaran.update");

	Route::delete('status-pembayaran/{id}','StatusPembayaranController@delete')
	->name("status-pembayaran.delete");

	//transaksi pesanan
	Route::get('transaksi-pesanan','TransaksiPesananController@index');
	//filter tanggal
	Route::get('transaksi-pesanan/periode','TransaksiPesananController@periode');

	Route::get('transaksi-pesanan/add','TransaksiPesananController@add');
	Route::post('transaksi-pesanan/add','TransaksiPesananController@store');

	Route::get('transaksi-pesanan/{id}','TransaksiPesananController@edit')
	->name("transaksi-pesanan.edit");
	Route::put('transaksi-pesanan/{id}','TransaksiPesananController@update')
	->name("transaksi-pesanan.update");

	Route::delete('transaksi-pesanan/{id}','TransaksiPesananController@delete')
	->name("transaksi-pesanan.delete");

	//menaikkan status pesanan
	Route::get('transaksi-pesanan/naikkan-status/{id}','TransaksiPesananController@naikkan_status');

	//menaikkan status pembayaran
	Route::get('transaksi-pesanan/naikkan-pembayaran/{id}','TransaksiPesananController@naikkan_pembayaran');

	//cetak transaksi pesanan
	Route::get('transaksi-pesanan/print/{id}','TransaksiPesananController@export');

	//untuk manage table nama_usaha
	Route::get('nama-usaha','ProfileController@index');
	Route::put('nama-usaha','ProfileController@update');

	//untuk export transaksi
	Route::get('export','TransaksiExportController@index');
	Route::get('/export/export_excel', 'TransaksiExportController@export_excel');

	//Dashboard Diagram
	Route::get('charts','ChartsController@index');

});

Auth::routes();

Route::get('/home', function(){
	//Setelah login, langsung masuk ke halaman beranda
	return redirect('charts');
});

Route::get('keluar',function(){
	\Auth::logout(); //sebuah function untuk menghapus session dari user login
	return redirect('login'); //setelah dihapus, user di redirect ke halaman login kembali
});