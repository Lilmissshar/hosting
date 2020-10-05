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

		$destinations = Destination::all();
		

		// if ($request->wantsJson()) {
	 //      return route('test', $data);
	 //    }
	    return \App::call('App\Http\Controllers\Client\RecommendationsController@viewTest');
		// 	Session::put('startDate', $request->startDate);

	}

	public function test(){

		
		$start = Session::get('startDate');
		$end = Session::get('endDate');


		
		return view($this->path . 'saving', ['start' => $start, 'end' => $end]);

	}

	public function viewTest(){

		$destinations = Destination::all();
		$start = Session::get('startDate');
		$end = Session::get('endDate');

		return view($this->path . 'testtt', ['destinations' => $destinations, 'start' => $start, 'end' => $end]);
	}

}