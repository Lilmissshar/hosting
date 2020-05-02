<?php

use App\User;
use Carbon\Carbon;


function current_user(){
  return Auth::user();
}

function admin_register_open(){
	return User::count() == 0;
}

function is_active($path, $class = 'active'){
  return Request::is('*' . $path . '*') ? 'active' :  '';
}

function directory_path($option = ''){
  return 'public/' . $option . '/';
}

//admin avatars helper functions
function avatar_storage_path($option = 'thumbnail'){
  return directory_path('avatars') . $option . '/';
}

function avatar_picture_url($url, $option = 'thumbnail'){
	if (avatar_picture_exists($url)) {
		return Storage::url(avatar_storage_path($option) . $url);
	}
  return asset('images/default_avatar.jpg');
}

function avatar_picture_exists($url, $option = 'thumbnail'){
  if ($url == '' || $url == null) {
    return false;
  }
  if ( Storage::exists(avatar_storage_path($option) . $url) ) {
    return true;
  }else{
    return false;
  }
}

function date_to_human($date, $format = 'd/m/Y, h:i A'){
	if ($date == null) {
		return '';
	}
	$dt = Carbon::parse($date);
	return $dt->format($format);
}
