<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
	protected $table = 'paket';
	public $incrementing = false; //Karena kita tidak menggunakan auto_increment
}
