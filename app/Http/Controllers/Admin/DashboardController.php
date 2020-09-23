<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Destination;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

	protected $path = 'admin.dashboard.';

	public function dashboard(){
		$categories = Category::count();
		$destinations = Destination::count();
		$plans = Plan::count();
		return view($this->path . 'index', ['categories' => $categories, 'destinations' => $destinations, 'plans' => $plans]);
	}
}