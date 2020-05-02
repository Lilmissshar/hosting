<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
   protected $fillable = [
      'museumName'
  ];

  public function form() {
    return $this->belongsToMany('App\Form');
	}
}
