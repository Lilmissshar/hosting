<?php

namespace App\Services\Admin;

use App\Plan;
use App\Plan_destination;
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

	public function store(Request $request){

		$data = $request->validate([
			'name' => "required"
		]);

		$plan = new Plan();
		$plan->name = $request->name;
		$plan->user_id = current_user()->id;
		$plan->save();

		 foreach($request->destination_id as $id){
        	$planDestination = new Plan_destination();
        	$planDestination->plan_id = $plan->id;
        	$planDestination->destination_id = $id;
        	$planDestination->save();
        }


		return redirect()->route('admin.plans.index');
	}

	public function transformDestination($destinations){
    	$names = [];

    	foreach ($destinations as $destination) {
    		array_push($names, $destination->name);
    	}

    	return implode(',', $names);

    }


	public function transform($plan){
		return [
			'id' => $plan->id,
			'name' => $plan->name,
			'user_id' => $plan->user_id,
			'destinations' => $this->transformDestination($plan->destinations)
		];
	}
}
