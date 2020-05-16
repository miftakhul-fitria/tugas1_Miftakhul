<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class T_pesanan extends Model
{
    use SoftDeletes;

    protected $table = 't-pesanan';
    public $incrementing = false; //Karena kita tidak menggunakan auto_increment

    //Relasi
    public function customers(){
    	return $this->belongsTo('App\Models\Customer','customer','id');
    }

    //Relasi
    public function pakets(){
    	return $this->belongsTo('App\Models\Paket','paket','id');
    }

    //Relasi
    public function status_pesanans(){
    	return $this->belongsTo('App\Models\StatusPesanan','status_pesanan','id');
    }

    //Relasi
    public function status_pembayarans(){
    	return $this->belongsTo('App\Models\StatusPembayaran','status_pembayaran','id');
    }
}
