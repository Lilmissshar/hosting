<?php

namespace App\Services\Client;

use App\Museum;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class MuseumsService extends TransformerService{
	
	public function all(Request $request){
		$museums = Museum::whereNotIn('id', $request->ids)->get(); //this is to show the data that hasn't been clicked. the id is the column name

  		return response()->json($this->transformCollection($museums));
	}	

	public function transform($museum){
		return [
			'id' => $museum->id,
			'museumName' => $museum->museumName
		];
		//transform the data that we want. 
		//so it will return in this case, the id and the museum name. 
		//from the museum we take the id and the museumName 
	}
}
