<?php

namespace App\Services\Admin;

use App\Destination;
use App\Destination_category;
use App\KeywordDestination;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use File;

class DestinationsService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; 
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $destinations = Destination::where('id', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $destinations->count();

	    $destinations = $destinations->limit($limit)->offset($offset);

	    $ids = json_decode($request->ids); //jsondecode (from string to array)

	    //the reason we don't send array straight away is because the url cannot read it, if u use string then only it will include the [,] brackets to indicate it as an "array"
	    
	    if($ids > 0) { //count how many array elemets are in .. if(count($ids) > 0)
			$destinations = $destinations->whereNotIn('id', $ids); 
			//use the wherenotin to exclude whatever is in that id
	    }

	    $destinations = $destinations->get();
	    
	    return respond(['rows' => $this->transformCollection($destinations), 'total' => $listCount]);
	}

	public function store(Request $request) {

		$data = $request->validate([
			'name' => "required",
			'description' => "required",
			"state" => "required",
            "type" => "required"
		]);

        $destination = new Destination(); 
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->state = $request->state;
        $destination->type = $request->type;

        if ($request->file('image')){
			$imageName = Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(public_path('images/destinations'), $imageName);
			$destination->picture = $imageName;
			$destination->save();
		} else {
			$destination->save();
		}


        foreach($request->category_id as $id){
        	$destinationCategory = new Destination_category();
        	$destinationCategory->destination_id = $destination->id;
        	$destinationCategory->category_id = $id;
        	$destinationCategory->save();
        }

        foreach($request->keyword_id as $id){
        	$destinationCategory = new KeywordDestination();
        	$destinationCategory->destination_id = $destination->id;
        	$destinationCategory->keyword_id = $id;
        	$destinationCategory->save();
        }

        return redirect()->route('admin.destinations.index');
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

		foreach($request->category_id as $id){
			$destinationCategory = new Destination_category();
			$destinationCategory->destination_id = $destination->id;
			$destinationCategory->category_id = $id;
			$destinationCategory->save();
		}

		$destination->category()->sync([]);
		$destination->category()->sync($request->category_id);

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


    public function transformKategory($categories){
    	$names = [];

    	foreach ($categories as $category) {
    		array_push($names, $category->name);
    	}

    	return implode(',', $names);

    }

    public function transformkey($keywords) {
    	$names = [];

    	foreach($keywords as $keyword) {
    		array_push($names, $keyword->name);
    	}

    	return implode(',', $names);
    }

	public function transform($destination){
		return [
			'id' => $destination->id,
			'name' => $destination->name,
			'description' => $destination->description,
			'state' => $destination->state,
			'type' => $destination->type,
			'categories' => $this->transformKategory($destination->category),
			'keywords' =>$this->transformkey($destination->keywords),
			'picture' =>$destination->picture
		];
	}
}
