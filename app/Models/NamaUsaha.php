<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaUsaha extends Model
{
    protected $table = 'nama_usaha';
    public $incrementing = false; //karena tidak menggunakan auto_increment
}
