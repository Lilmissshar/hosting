<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    protected $fillable = [
    	'id',
    	'lists_id',
    	'name',
    	'customers_id',
    	'timestamp'
    ];

    public function destinations() {
    	return $this->belongsToMany('App\destinations', 'lists_destinations', 'lists_id', 'destinations_id');
    }
}
