<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
   protected $fillable = [
      'name', 
      'email', 
      'mobile', 
      'overall_rating', 
      'guide_rating', 
      'improvements',
      'liked'
  ];

  public function addresses() {
  	return $this->hasMany('App\Address');
  }

  public function museums() {
    return $this->belongsToMany('App\Museum', 'form__museum', 'form_id', 'museum_id');
    //first parameter: all the museums related to this form
    //second : which table it is connected to. in case it cannot find, use this table to find the information
    //third: key from this model
    //fourth: based on the other side, how it is connected to this model
    //but then, if we are doing from the museums model, then it will be app/forms, and vice versa, needs to be changed accordingly. in this case the third parameter will be museum_id. 
  }
}
