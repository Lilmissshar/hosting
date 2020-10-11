<?php

namespace App\Services\Admin;

use App\KeywordDestination;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class KeywordDestinationsService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; 
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $keywordDestinations = KeywordDestination::where('id', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $keywordDestinations->count();

	    $keywordDestinations = $keywordDestinations->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $this->transformCollection($keywordDestinations), 'total' => $listCount]);
	}

	// public function store(Request $request){

	// 	$data = $request->validate([
	// 		'name' => "required"
	// 	]);

	// 	$keyword = new Keyword();
	// 	$keyword->name = $request->name;
	// 	$keyword->save();

	// 	return redirect()->route('admin.keywords.index');
	// }

	// public function update(Request $request, Keyword $keyword){

	// 	$data = $request->validate ([
	// 		'name'=> 'required'
	// 	]);

	// 	$keyword->name = $data['name'];
	// 	$keyword->save();

	// 	return redirect()->route('admin.keywords.index');
	// }

	// public function update(Request $request, Plan $plan) {
 //    $data = $request->validate([
 //      'name' => 'required|string|max:15',
 //    ]);

 //    $museum->museumName = $data['museumName']; //when send request, it will receive the ID, so this $museum will get the content immediately. But the ID is received from the form. 
 //    $museum->save();

 //    return redirect()->route('museums.index'); 
 //  }



	public function transform($keywordDestination){
		return [
			'id' => $keywordDestination->id,
			'keyword_id' => $keywordDestination->keyword_id,
			'destination_id' => $keywordDestination->destination_id
		];
	}
}
