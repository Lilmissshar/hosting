<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
    	'destinations_id',
    	'name',
    	'description',
    	'state',
    	'type'
    ];

    public function lists() {
    	return $this->belongsToMany('App\lists', 'lists_destinations', 'lists_id', 'destinations_id');
    }

    public function category() {
    	return $this->belongsToMany('App\category', 'destinations_category', 'destinations_id', 'category_id');
    }
}
