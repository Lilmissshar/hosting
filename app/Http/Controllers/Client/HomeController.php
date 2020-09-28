<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

	protected $path = 'client.';

	public function home(){
		return view($this->path . 'home');
	}

	public function datepicker(){
		return view($this->path . 'recommendation');
	}

	public function saveDate(Request $request){
		$data = [
			'startDate' => $request->startDate,
			'endDate' => $request->endDate
			];

		// $data = $request->validate([
		// 	'name' => "required",
		// 	'date' => "required"
		// ]);

		// $category = new Category();
		// $category->name = $request->name;
		// $category->description = $request->description;
		// $category->save();

		if ($request->wantsJson()) {
	      return route('test', $data);
	    }
	    return view($this->path . 'recommendation1', $data);

	}

}