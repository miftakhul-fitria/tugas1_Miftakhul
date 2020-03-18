<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $incrementing = false; //karena tidak menggunakan auto_increment
}
