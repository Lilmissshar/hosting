<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
      'name'
  ];

  public function destinations() {
    	return $this->belongsToMany('App\Destination', 'keyword_destinations', 'destination_id', 'keyword_id');
    }
}
