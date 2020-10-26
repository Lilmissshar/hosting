<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_destination extends Model
{
    protected $fillable = [
    	'plan_id',
    	'destination_id',
        'day'
    ];

    public function plans() {
    	return $this->belongsTo('App\Plan');
    }

    public function destinations() {
    	return $this->belongsTo('App\Destination');
    }
}
