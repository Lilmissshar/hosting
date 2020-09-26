<?php

namespace App\Services\Admin;

use App\Destination;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class DestinationsService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; 
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $destinations = Destination::where('id', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $destinations->count();

	    $destinations = $destinations->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $this->transformCollection($destinations), 'total' => $listCount]);
	}

	public function update(Request $request, Destination $destination){
		$data = $request->validate([
			'name' => 'required',
			'description' => 'required',
			'state' => 'required',
			'type' => 'required'
		]);

		$destination->name = $data['name'];
		$destination->description = $data['description'];
		$destination->state = $data['state'];
		$destination->type = $data['type'];
		$destination->save();

		return redirect()->route('admin.destinations.index');
	}

	// public function update(Request $request, Plan $plan) {
 //    $data = $request->validate([
 //      'name' => 'required|string|max:15',
 //    ]);

 //    $museum->museumName = $data['museumName']; //when send request, it will receive the ID, so this $museum will get the content immediately. But the ID is received from the form. 
 //    $museum->save();

 //    return redirect()->route('museums.index'); 
 //  }



	public function transform($destination){
		return [
			'id' => $destination->id,
			'name' => $destination->name,
			'description' => $destination->description,
			'state' => $destination->state,
			'type' => $destination->type
		];
	}
}
