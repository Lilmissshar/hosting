<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
      'form_id', 
      'name'
  ];

  public function form() {
  	return $this->belongsTo('App\Form');
  }
}
