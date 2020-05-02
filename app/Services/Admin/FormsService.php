<?php

namespace App\Services\Admin;

use App\Form;
use App\Address;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class FormsService extends TransformerService{

	public function all(Request $request){
		$sort = $request->sort ? $request->sort : 'created_at';
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $forms = Form::where('name', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $forms->count();

	    $forms = $forms->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $forms, 'total' => $listCount]);
	}

	public function transform($form){
		return [
			'name' => $form->name,
			'email' => $form->email,
			'mobile' => $form->mobile,
			'overall_rating' => $form->overall_rating,
			'guide_rating' => $form->guide_rating,
			'improvements' => $form->improvements
        
		];
	}
}
