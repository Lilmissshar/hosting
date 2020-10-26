<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use App\Destination_category;
use App\KeywordDestination;
use App\Keyword;
use App\Plan;
use App\Plan_destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;


class RecommendationsController extends Controller {

	protected $path = 'client.recommendations.';

	public function datepicker(){
		return view($this->path . 'recommendation');
	}

	public function saveDate(Request $request){


		$start = Carbon::parse($request->start_date);
		$end = Carbon::parse($request->end_date);
	    $diff = $start->diffInDays($end);
	    
	    Session::put('diff', $diff);
	    Session::put('name', $request->name);
	    Session::put('startDate', $request->start_date);
	    Session::put('endDate', $request->end_date);

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
		// Session::put('startDate', $request->start_date);
		// Session::put('endDate', $request->end_date);
		// Session::put('state', $request->state);
		Session::put('category', $request->category);

		$destinations = Destination::where('state', $request->state)->whereHas('category', function($destinations) {
			$destinations->where('category_id', Session::get('category'));
		})->get();

		Session::put('destinations', $destinations);
		

		// if ($request->wantsJson()) {
	 //      return route('test', $data);
	 //    }
		return redirect()->route('showDestinations')->with('destinations', $destinations);
	    // return view($this->path . 'recommendedDestinations', compact('destinations'));
		// 	Session::put('startDate', $request->startDate);

	}

	public function showDestinations(){

		$destinations = Session::get('destinations');


		return view($this->path . 'recommendedDestinations', ['destinations' => $destinations]);

	}
	

	public function saveChosenDestinations(Request $request){

		$chosenDestinations = $request->destination;

		$validator = Validator::make($request->all(), [
		'destination' => 'min:3|max:6'
		]);

		if (!empty($chosenDestinations)){
			if ($validator->fails()) {
			return response()->json('You must enter 3 to 6 choices', 422);
			}
		} else {
		return response()->json('Cannot empty', 422);
		}

		if ($validator->fails()) {
			return response()->json('You must enter 3 to 6 choices', 422);
		}

		$chosens = array();
		foreach ($chosenDestinations as $destination) {
			
			$chosens[] = $destination;			

		}


		$keyss = array();

		foreach ($chosens as $keyword){

			$keys = KeywordDestination::where('destination_id', $keyword)->get();
			foreach ($keys as $key){
				$keyss[] = $key->keyword_id;

			}

		}
		
		$keyWords = array();
		// $keyWordsId = array();
		foreach ($keyss as $key){
			$key = Keyword::where('id', $key)->get();
			foreach ($key as $k){
				$keyWords[] = $k->name;
				// $keyWordsId[] = $k->id;
			}
		}

		// dd($keyWordsId);
		// dd($keyWords);
		$totalCount = count($keyWords);
		// dd($totalCount);
		$wordCount = array_count_values($keyWords);
		arsort($wordCount);
		// dd($wordCount);
		$count = array_splice($wordCount, 0, 10);

		$highCount = array();
		foreach ($count as $key => $val) {
			// echo "$key = $val\n";
			$highCount[] = $key;

		}
		//highCount has the top 10 keywords for current user.

		// dd($highCount);

		$test = array();
		
		foreach ($highCount as $high) {
			$find = Keyword::where('name', $high)->get();

			
			foreach ($find as $f){
				// echo "$f->id\n";
				$get = KeywordDestination::where('keyword_id', $f->id)->get();

				foreach ($get as $t){
					// echo "$t->destination_id\n";
					$d = Destination::where('id', $t->destination_id)->get();
					// echo $d;
				

					foreach ($d as $f){
						$test[] = $f;
					}
				
				
				}
				
			}
				
		}
		
		$u = array_unique($test);
		$val = count($u);
		
		$diff = Session::get('diff');

		$days = array_chunk($u, 3);
		$final = array_splice($days, 0, $diff);

		Session::put('recommendations', $final);

		
	
		// $place =
		// $accomodation = 

		// $countDest = array_splice($u, 0, 15);


		// dd($countDest);	
	

// $destinations = Destination::where('state', $state)->whereHas('category', function($destinations) {
// 			$destinations->where('category_id', Session::get('category'));
// 		})->get();

		// $percentage = [];
		// foreach ($wordCount as $word){
		// 	$percentage[] = number_format(($word/$totalCount) * 100, 2);
		// }
		// $ke = array();
		// foreach ($wordCount as $word){
		// 	$k = KeywordDestination::where('keyword_id', $word)->get();
		// 	foreach($k as $dest){
		// 		echo $dest->destination_id;
		// 		$ke[] = $dest->id;
		// 	}
		// }

		// dd($keyss);

		// dd($request->destination);

		// dd($destinations[2]);

		// foreach ($destinations as $destination) {

		// }

		return view($this->path . 'saving', ['keywords' => $final]);
		
	}

	public function save(Plan $plan){

		$recommendations = Session::get('recommendations');
		

		$plan = new Plan();
		$plan->name = Session::get('name');
		$plan->user_id = current_user()->id;
		$plan->start_date = Session::get('startDate');
		$plan->end_date = Session::get('endDate');
		$plan->save();

		$test = array();
		$i = 0;
		foreach ($recommendations as $recommendation){
			$i++;
			
			foreach ($recommendation as $index => $id){
				
				$planDest = new Plan_destination();
				$planDest->plan_id = $plan->id; 
				$planDest->destination_id = $id->id;
				$planDest->day = $i;
				$planDest->save();
			}

		}

		return redirect()->route('home');
		
	}


 //  public function update(Request $request, PLan $plan){

 //  	$data = $request->validate([
	// 		'description' => 'required'	
	// 	]);

	// 	$appointment->review->description = $data['description'];
	// 	$appointment->review->save();

	// 	return redirect()->route('appointments.showAppointments');
	// }

  

	// public function showRecommendations(){
	// 	$start = Session::get('startDate');
	// 	$end = Session::get('endDate');

	// }

	// public function test(){

		
	// 	$start = Session::get('startDate');
	// 	$end = Session::get('endDate');


		
	// 	return view($this->path . 'saving', ['start' => $start, 'end' => $end]);

	// }

	// public function viewTest(){

	// 	$destinations = Destination::all();
	// 	$start = Session::get('startDate');
	// 	$end = Session::get('endDate');

	// 	return view($this->path . 'testtt', ['destinations' => $destinations, 'start' => $start, 'end' => $end]);
	// }

	// public function viewDestinations(){

	// 	$startDate = Session::get('startDate');
	// 	$endDate = Session::get('endDate');
	// 	$state = Session::get('state');
	// 	$category = Session::get('category');
		

	// 	$destinations = Destination::where('state', $state)->whereHas('category', function($destinations) {
	// 		$destinations->where('category_id', Session::get('category'));
	// 	})->get();

	// 	 // $appointments = Appointment::where('date', 'like', "%{$query}%")->whereHas('service_staff', function($appointments) {
	// 		//     	$appointments->where('staff_id', current_user()->id);
	// 		//     })->orderBy($sort, $order);
	// 	// $test = Destination::where('state', $state)->whereHas('keywords', function($destinations) {
	// 	// 	$destinations->where('keyword_id', 1);
	// 	// })->whereHas('category', function($destinations) {
	// 	// 	$destinations->where('category_id', 1);
	// 	// })->get();
	// 	// dd($test);

	// 	Session::put('destinations', $destinations);

	// 	return \App::call('App\Http\Controllers\Client\RecommendationsController@showDestinations');

		// return view($this->path . 'recommendedDestinations', ['destinations' => $destinations]);



}