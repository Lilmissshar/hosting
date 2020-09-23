<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination_category extends Model
{
    protected $fillable = [
    	'category_id',
    	'destination_id'
    ];

    public function destinations() {
    	return $this->belongsTo('App\Destination');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
    }
}
