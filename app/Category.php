<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'category_id',
      'name',
      'description'
  ];

  public function destinations() {
    	return $this->belongsToMany('App\destinations', 'destinations_category', 'destinations_id', 'category_id');
    }
}
