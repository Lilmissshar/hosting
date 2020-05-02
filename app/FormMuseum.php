<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormMuseum extends Model
{
	protected $table = 'form__museum';

    protected $fillable = [
      'form_id',
      'museum_id'
  ];

   public function form() {
  	return $this->belongsTo('App\Form');
  }

  public function museum() {
  	return $this->belongsTo('App\Museum');
  }
}
