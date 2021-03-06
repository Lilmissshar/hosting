<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password','mobile',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

    public static function boot(){
        parent::boot();
        static::creating(function($user){
            $password = bcrypt($user->password);
            $user->password = $password;
        });
    }

    public function plans() {
    return $this->hasMany('App\Plan'); 
  }

  public function reviews() {
    return $this->hasMany('App\Review'); 
  }

}
