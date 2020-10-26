<?php

namespace App\Services\Client;

use App\Plan;
use App\Plan_destination;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class PlansService extends TransformerService{

	protected $path = 'client.plans.';

	public function all(){
		$plans = Plan::where('user_id', current_user()->id)->paginate(15);
		$plans->getCollection()->transform(function($plan) {
			return $this->transform($plan);
		});

		return view($this->path . 'index', ['plans' => $plans]);
		
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
			'start_date' =>$plan->start_date,
			'end_date' =>$plan->end_date,
			'destinations' => $this->transformDestination($plan->destinations)
		];
	}

}
