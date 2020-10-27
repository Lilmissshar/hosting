<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller{

	protected $path = 'client.gallery.';

	public function gallery(){

		$destinations = Destination::all();

		return view($this->path . 'gallery', ['destinations' => $destinations]);
	}

	public function galleryPenang(Request $request){


		$destinations = Destination::where('state', 'Penang')->get();
		
		return view($this->path . 'gallery', ['destinations'=> $destinations]);
	}

	public function galleryPenangSightSeeing(){

		$destinations = Destination::where('state', 'Penang')->where('type', 'Sight-see')->get();

		return view($this->path . 'gallery', $destinations);
	}

	public function gallerySelangor(Request $request){

		$destinations = Destination::where('state', 'Selangor')->get();
		
		return view($this->path . 'gallery', ['destinations'=> $destinations]);
	}

}