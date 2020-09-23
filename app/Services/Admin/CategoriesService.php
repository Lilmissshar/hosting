<?php

namespace App\Services\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class CategoriesService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; 
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $categories = Category::where('id', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $categories->count();

	    $categories = $categories->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $this->transformCollection($categories), 'total' => $listCount]);
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
