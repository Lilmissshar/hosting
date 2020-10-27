<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'id',
    	'user_id',
        'plan_id',
        'review'
    ];

    public function users() {
    return $this->belongsTo('App\User');
  }

  public function plans() {
  	return $this->belongsTo('App\Plan');
  }
}