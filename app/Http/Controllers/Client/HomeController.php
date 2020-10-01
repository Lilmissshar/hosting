<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

	protected $path = 'client.';

	public function home(){
		return view($this->path . 'home');
	}

	public function datepicker(){
		return view($this->path . 'recommendation.recommendation');
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
	    return view($this->path . 'recommendation.recommendation1', $data);

	}

	public function gallery(){

		return view($this->path . 'gallery');
	}

	public function galleryPenang(Request $request){

		$penang = Destination::where('state', 'Penang')->get();
		
		return view($this->path . 'galleryPenang',['penang'=> $penang]);
	}

	public function galleryPenangSightSeeing(){

		$penangsightsee = Destination::where('state', 'Penang')->where('type', 'Sight-see')->get();
		dd($penangsightsee);

		return view($this->path . 'galleryPenang', $penangsightsee);
	}

}