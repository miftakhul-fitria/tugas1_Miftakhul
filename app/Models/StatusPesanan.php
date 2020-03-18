<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    protected $table = 'status-pesanan';
	public $incrementing = false; //Karena kita tidak menggunakan auto_increment
}
