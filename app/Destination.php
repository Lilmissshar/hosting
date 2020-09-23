<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'state',
    	'type'
    ];

    public function plans() {
    	return $this->belongsToMany('App\Plan', 'plan_destinations', 'plan_id', 'destination_id');
    }

    public function category() {
    	return $this->belongsToMany('App\Category', 'destination_categories', 'destination_id', 'category_id');
    }
}
