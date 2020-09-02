<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_destination extends Model
{
    protected $fillable [
    	'lists_destinations_id',
    	'lists_id',
    	'destinations_id'
    ];

    public function lists() {
    	return $this->belongsTo('App\lists');
    }

    public function destinations() {
    	return $this->belongsTo('App\destinations');
    }
}
