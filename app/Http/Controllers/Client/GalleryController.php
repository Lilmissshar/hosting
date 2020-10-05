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

		$penang = Destination::where('state', 'Penang')->get();
		
		return view($this->path . 'penang.galleryPenang',['penang'=> $penang]);
	}

	public function galleryPenangSightSeeing(){

		$penangsightsee = Destination::where('state', 'Penang')->where('type', 'Sight-see')->get();
		dd($penangsightsee);

		return view($this->path . 'penang.galleryPenang', $penangsightsee);
	}

}