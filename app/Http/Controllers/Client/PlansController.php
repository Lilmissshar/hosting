<?php

namespace App\Http\Controllers\Client;

use App\Plan;
use App\Destination;
use App\Plan_destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\PlansService;
use Session; 
use Validator;

class PlansController extends Controller
{
    protected $path = 'client.plans.';
    protected $plansService;

    public function __construct(PlansService $plansService){
        $this->planService = $plansService;
      } 

    public function index(Request $request){
      return $this->planService->all();
    }
    

    public function create()
    {
      return view($this->path . 'create');
    }

    public function store(Request $request)
    {
      return $this->planService->store($request);
    }

    public function edit(Plan $plan){

        Session::put('plan', $plan);
        
        return redirect()->route('editDay');
       
    }

    public function editDay(Plan $plan, Request $request){
        $plan = Session::get('plan');
        $planDest = Plan_destination::with(['plans', 'destinations'])->where('plan_id', $plan->id)->get();
        
        foreach ($planDest as $d){
            dd($d->day);
        }
        
        dd($planDest);
      


        // $plan = Session::get('plan');
        // $plans = Plan_destination::where('plan_id', $plan->id)->get();

        // $destinations = array();
        
        // foreach ($plans as $k){
        //     $dest = Destination::where('id', $k->destination_id)->get();
        //     foreach ($dest as $d){
        //         $destinations[] = $d;            
        //     }
            
        // }
        // $chunk = array_chunk($destinations, 3);

        // Session::put('chunk', $chunk);
        // Session::put('destinations', $destinations);


        // // $n = Plan_destination::where('plan_id', $plan->id)->get();

        // $pl = Plan_destination::where('plan_id', $plan->id)->whereHas('destinations', function($pl){
        //     $pl->where('id', Session::put('destinations')['id']);
        // })->get();

        // dd($pl);

        // $destinations = Destination::where('state', $state)->whereHas('category', function($destinations) {
//          $destinations->where('category_id', Session::get('category'));
//      })->get();
        
        // $ar = array();
        // foreach ($n as $d){

        //     $q = Plan::where('id', $d->plan_id)->get();
        //     $ar[] = $q;
        // }
        // // dd($ar[2]);

        return view($this->path . 'editting', ['days' => $chunk, 'plan'=> $plan]);        

    }

    public function editDestinations(){

        $plan = Session::get('plan');
        $loop = session()->get('loop');
        $dest = Session::get('chunk');
      
        $in = $dest[$loop];

        $d = array();
        foreach ($in as $i){
            $d[] = $i->id;
        }

       $finalized = Destination::whereNotIn('id', $d)->get();
        
        
        // $destination = Destination::
       

        return view($this->path . 'edit', ['destinations' => $finalized, 'plan' => $plan, 'loop' => $loop]);
    }

    public function editSpecifics($loop){
        Session::put('index', $loop);
        Session::get('index');
       
       return redirect()->route('editDestinations')->with(['loop' => $loop]);



    }

    public function chosen(Request $request){
        $chosenDestinations = $request->destination;
        
        $validator = Validator::make($request->all(), [
        'destination' => 'min:1|max:3'
        ]);

        if (!empty($chosenDestinations)){
            if ($validator->fails()) {
            return response()->json('You must enter 1 to 3 choices', 422);
            }
        } else {
        return response()->json('Cannot be empty', 422);
        }

        if ($validator->fails()) {
            return response()->json('You must enter 1 to 3 choices', 422);
        }
        
        return redirect()->route('savingEdit')->with(['chosen' => $chosenDestinations]);

    }

    public function savingEdit(){
        $chosen = session()->get('chosen');
        $loop = Session::get('index');
        $plan = Session::get('plan');
        $chunk = Session::get('chunk');
        $insert = $chunk[$loop];
    
    

        foreach($chosen as $id){
            $planDest = new Plan_destination();
            $planDest->plan_id = $plan->id;
            $planDest->destination_id = $id;
            $planDest->day = $loop+1;
            $planDest->save();

            // $plan->services()->sync([]);
            // $plan->destinations()->sync($chosen);
        
        }
        

        // $plan->destinations()->sync($chosen);
        return redirect()->route('home');
    }

  public function update(Request $request, Plan $plan){
    return $this->planService->update($request, $plan);
  }



    // public function edit(Plan $plan) {
    //   $destination = $plan->destinations;
    //   dd($destination);

    // }


}
