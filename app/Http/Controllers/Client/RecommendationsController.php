<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class RecommendationsController extends Controller {

	protected $path = 'client.recommendations.';

	public function datepicker(){
		return view($this->path . 'recommendation');
	}

	public function saveDate(Request $request){
		// $data = [
		// 	'startDate' => $request->startDate,
		// 	'endDate' => $request->endDate
		// 	];

		// $data = $request->validate([
		// 	'name' => "required",
		// 	'date' => "required"
		// ]);

		// $category = new Category();
		// $category->name = $request->name;
		// $category->description = $request->description;
		// $category->save();
		Session::put('startDate', $request->startDate);
		Session::put('endDate', $request->endDate);
		return \App::call('App\Http\Controllers\Client\RecommendationsController@test');

		// if ($request->wantsJson()) {
	 //      return route('test', $data);
	 //    }
	 //    return view($this->path . 'recommendation1', $data);

		// 	Session::put('startDate', $request->startDate);

	}

	public function test(){

		
		$start = Session::get('startDate');
		$end = Session::get('endDate');


		
		return view($this->path . 'saving', ['start' => $start, 'end' => $end]);

	}

}