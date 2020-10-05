<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeywordDestination extends Model
{
    protected $fillable = [
    	'destination_id',
    	'keyword_id'
    ];

    public function destinations() {
    	return $this->belongsTo('App\Destination');
    }

    public function keywords() {
    	return $this->belongsTo('App\Keyword');
    }
}
