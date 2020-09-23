<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name',
      'description'
  ];

  public function destinations() {
    	return $this->belongsToMany('App\Destination', 'destination_categories', 'destination_id', 'category_id');
    }
}
