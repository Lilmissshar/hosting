<?php

namespace App\Services\Admin;

use App\Plan;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class PlansService extends TransformerService{

	public function all(Request $request){

		$sort = $request->sort ? $request->sort : 'created_at'; 
	    $order = $request->order ? $request->order : 'desc';
	    $limit = $request->limit ? $request->limit : 10;
	    $offset = $request->offset ? $request->offset : 0;
	    $query = $request->search ? $request->search : '';

	    $plans = Plan::where('id', 'like', "%{$query}%")->orderBy($sort, $order);
	    $listCount = $plans->count();

	    $plans = $plans->limit($limit)->offset($offset)->get();

	    return respond(['rows' => $this->transformCollection($plans), 'total' => $listCount]);
	}


	public function transform($plan){
		return [
			'id' => $plan->id,
			'name' => $plan->name,
			'user_id' => $plan->user_id
		];
	}
}
