<?php

namespace App\Services\Admin;

use App\Keyword;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class KeywordsService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'id'; //last parameter is the default
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search :'';

	    $keywords = Keyword::where('id', 'like', "%{$query}%")->orderBy($sort, $order);

	    $listCount = $keywords->count();

	    $keywords = $keywords->limit($limit)->offset($offset);
	    
	    $ids = json_decode($request->ids); //jsondecode (from string to array)

	    //the reason we don't send array straight away is because the url cannot read it, if u use string then only it will include the [,] brackets to indicate it as an "array"
	    
	    if($ids > 0) { //count how many array elemets are in .. if(count($ids) > 0)
			$keywords = $keywords->whereNotIn('id', $ids); 
			//use the wherenotin to exclude whatever is in that id
	    }

	    $keywords = $keywords->get();
	    
	    return respond(['rows' => $keywords, 'total' => $listCount]);
	}

	public function store(Request $request){

		$data = $request->validate([
			'name' => "required"
		]);

		$keyword = new Keyword();
		$keyword->name = $request->name;
		$keyword->save();

		return redirect()->route('admin.keywords.index');
	}

	public function update(Request $request, Keyword $keyword){

		$data = $request->validate ([
			'name'=> 'required'
		]);

		$keyword->name = $data['name'];
		$keyword->save();

		return redirect()->route('admin.keywords.index');
	}

	// public function update(Request $request, Plan $plan) {
 //    $data = $request->validate([
 //      'name' => 'required|string|max:15',
 //    ]);

 //    $museum->museumName = $data['museumName']; //when send request, it will receive the ID, so this $museum will get the content immediately. But the ID is received from the form. 
 //    $museum->save();

 //    return redirect()->route('museums.index'); 
 //  }



	public function transform($keyword){
		return [
			'id' => $keyword->id,
			'name' => $keyword->name
		];
	}
}
