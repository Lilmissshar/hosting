<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'state',
    	'type',
        'picture'
    ];

    public function plans() {
    	return $this->belongsToMany('App\Plan', 'plan_destinations', 'plan_id', 'destination_id', 'day');
    }

    public function category() {
    	return $this->belongsToMany('App\Category', 'destination_categories', 'destination_id', 'category_id');
    }

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'keyword_destinations', 'destination_id', 'keyword_id');
    }
}
