<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laborer extends Model
{
    protected $fillable = ['loginname', 'firstname', 'lastname', 'country', 'phonecode', 'phonenumber', 'email', 'contactme', 'howmany', 'weekpay', 'weekhours', 'product', 'description', 'created_at'];
}
