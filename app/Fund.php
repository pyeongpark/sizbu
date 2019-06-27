<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
   protected $fillable = ['loginname', 'firstname', 'lastname', 'country', 'phonecode', 'phonenumber', 'email', 
    						'contactme', 'amount', 'product', 'description', 'created_at'];
}
