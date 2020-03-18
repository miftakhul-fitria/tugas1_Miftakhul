<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    protected $table = 'status-pembayaran';
	public $incrementing = false; //Karena kita tidak menggunakan auto_increment
}
