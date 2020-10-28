<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class GalleryController extends Controller{

	protected $path = 'client.gallery.';

	public function gallery(){

		$destinations = Destination::all();

		return view($this->path . 'gallery', ['destinations' => $destinations]);
	}

	public function filter(Request $request){

		// dd($request->state);

		$state = $request->state;
		$type = $request->type;

		if ($type == 'None'){
			$filter = Destination::where('state', $state)->get();
		} else {
			$filter = Destination::where('state', $state)->where('type', $type)->get();
		}

		return view($this->path . 'filter', ['destinations' => $filter]);
	}

}