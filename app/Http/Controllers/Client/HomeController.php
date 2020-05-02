<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

	protected $path = 'client.';

	public function home(){
		return view($this->path . 'home');
	}
}