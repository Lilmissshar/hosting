<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

	protected $path = 'admin.dashboard.';

	public function dashboard(){
		return view($this->path . 'index');
	}
}
