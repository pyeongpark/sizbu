<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //	if table for the model is not "purchases" (plural of class name)
    //  protected $table = 'my_purchases';

    protected $fillable = ['loginname', 'firstname', 'lastname', 'phonecode', 'phonenumber', 'email', 
    						'contactme', 'buysell', 'product', 'description', 'created_at'];
}
