<?php

namespace App\Services\Admin;

use App\Museum;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class MuseumsService extends TransformerService{

	public function all(Request $request){
		$sort = $request->sort ? $request->sort : 'created_at'; //last parameter is the default
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $museums = Museum::where('museumName', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $museums->count();

	    $museums = $museums->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $museums, 'total' => $listCount]);
	}

	public function update(Request $request, Museum $museum) {
    $data = $request->validate([
      'museumName' => 'required|string|max:15',
    ]);

    $museum->museumName = $data['museumName']; //when send request, it will receive the ID, so this $museum will get the content immediately. But the ID is received from the form. 
    $museum->save();

    return redirect()->route('museums.index'); 
  }



	public function transform($museum){
		return [
			'museumName' => $museum->museumName
		];
	}
}
