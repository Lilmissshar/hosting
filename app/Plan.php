<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'id',
    	'name',
    	'user_id',
    	'timestamp'
    ];

    public function destinations() {
    	return $this->belongsToMany('App\Destination', 'plan_destinations', 'plan_id', 'destination_id');
    }

    public function users() {
    return $this->belongsTo('App\User');
  }
}
