<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination_category extends Model
{
    protected $fillable = [
    	'destinations_category_id',
    	'category_id',
    	'destinations_id'
    ];

    public function destinations() {
    	return $this->belongsTo('App\destinations');
    }

    public function category() {
    	return $this->belongsTo('App\category');
    }
}
