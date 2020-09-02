<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    	'customers_id',
    	'name',
    	'email',
    	'password',
    	'mobile',
    	'is_active'
    ];

    protected $hidden = [
    	'password'
    ];
}
