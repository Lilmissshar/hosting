<?php

namespace App\Services\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class CategoriesService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; //last parameter is the default
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search :'';

	    $categories = Category::where('name', 'like', "%{$query}%")->orderBy($sort, $order);

	    $listCount = $categories->count();

	    $categories = $categories->limit($limit)->offset($offset);
	    
	    $ids = json_decode($request->ids); //jsondecode (from string to array)

	    //the reason we don't send array straight away is because the url cannot read it, if u use string then only it will include the [,] brackets to indicate it as an "array"
	    
	    if($ids > 0) { //count how many array elemets are in .. if(count($ids) > 0)
			$categories = $categories->whereNotIn('id', $ids); 
			//use the wherenotin to exclude whatever is in that id
	    }

	    $categories = $categories->get();
	    
	    return respond(['rows' => $categories, 'total' => $listCount]);
	}

	public function store(Request $request){

		$data = $request->validate([
			'name' => "required",
			'description' => "required"
		]);

		$category = new Category();
		$category->name = $request->name;
		$category->description = $request->description;
		$category->save();

		return redirect()->route('admin.categories.index');
	}

	public function update(Request $request, Category $category){

		$data = $request->validate ([
			'name'=> 'required',
			'description' => 'required'
		]);

		$category->name = $data['name'];
		$category->description = $data['description'];
		$category->save();

		return redirect()->route('admin.categories.index');
	}

	// public function update(Request $request, Plan $plan) {
 //    $data = $request->validate([
 //      'name' => 'required|string|max:15',
 //    ]);

 //    $museum->museumName = $data['museumName']; //when send request, it will receive the ID, so this $museum will get the content immediately. But the ID is received from the form. 
 //    $museum->save();

 //    return redirect()->route('museums.index'); 
 //  }



	public function transform($category){
		return [
			'id' => $category->id,
			'name' => $category->name,
			'description' => $category->description
		];
	}
}
