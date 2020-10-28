<?php

namespace App\Http\Controllers\Client;

use App\Plan;
use App\Destination;
use App\Plan_destination;
use App\Review;
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
        // dd($plan->reviews);

        // Session::put('plan', $plan);

        $planDest = Plan_destination::where('plan_id', $plan->id)->orderBy('day')->paginate(10);


        return view($this->path . 'editting', ['planDest' => $planDest]);
        
        // return redirect()->route('editDay');
       
    }

    // public function editDay(Plan $plan, Request $request){
    //     $plan = Session::get('plan');
    //     $planDest = Plan_destination::where('plan_id', $plan->id)->orderBy('day')->get();

    //     return view($this->path . 'editting', ['planDest' => $planDest]);   

        // $ar = array();
        // foreach ($planDest as $p){
        //     $ar[] = $p;
        // }

        // $ar2 = array();

        // foreach ($ar as $a){
        //     $planDest = Destination::where('id', $a->id)->get();
        //     $ar2[] = $planDest;
        // }

        //ar2 has the list of destinations


        
        // $p = Plan_destination::where('id', $plan->id)->whereHas('destinations', function ($p) {
        //     $p->orderBy('day');
        // })->get();
        
        // $d = Plan_destination::where('plan_id', $plan->id)->whereHas('destinations', function ($d){
        //     $d->pluck('name');
        // })->get();

      
      


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

             

    // }

    // public function editDestinations(){
       
    //    $choices = session()->get('choices');

    //     return view($this->path . 'edit', ['choices' => $choices]);
    // }



    public function editSpecifics($id){

        $q = Plan_destination::where('id', $id)->first();

        Session::put('id', $id);

        $choices = Destination::where('id', '!=', $q->destination_id)->get();

        return view($this->path . 'edit', ['choices' => $choices]);
       // return redirect()->route('editDestinations')->with(['choices' => $choices]);



    }

    public function filterEditSpecifics(Request $request){

        $state = $request->state;
        $type = $request->type;

        $id = Session::get('id');

        $q = Plan_destination::where('id', $id)->first();

        if ($type == 'None'){
            $filter = Destination::where('id', '!=', $q->destination_id)->where('state', $state)->get();
        } else {
            $filter = Destination::where('id', '!=', $q->destination_id)->where('state', $state)->where('type', $type)->get();
        }

        return view($this->path . 'filterEdit', ['choices' => $filter]);
    }

    public function chosen(Request $request){
        // dd($request);
        
        $id = Session::get('id');

        $chosenDestinations = $request->destination;

        
        // $validator = Validator::make($request->all(), [
        // 'destination' => 'min:1|max:1'
        // ]);


        // if ($validator->fails()) {
        //     return response()->json("You haven't entered a destination", 422);
        // }

        $data = Plan_destination::find($id);
        $data->destination_id = $chosenDestinations;
        $data->save();

        
        return redirect()->route('plans.index');

    }

    public function editAdd($id){

        $plans = Plan_destination::where('plan_id', $id)->get();

        $day = array();

        foreach ($plans as $plan){
            $day[] = $plan->day;
        }

        $unique = array_unique($day);
        $uni = array();
        foreach ($unique as $u){
            $uni[] = $u;
        }

        $destinations = Destination::all();
        

        return view($this->path . 'addNew', ['destinations' => $destinations, 'unique' => $uni, 'plan_id' => $id ]);
    }

    public function filterAdd(Request $request, $plan_id){

        $plans = Plan_destination::where('plan_id', $plan_id)->get();

        $day = array();

        foreach ($plans as $plan){
            $day[] = $plan->day;
        }

        $unique = array_unique($day);
        $uni = array();
        foreach ($unique as $u){
            $uni[] = $u;
        }

        $state = $request->state;
        $type = $request->type;

        $id = Session::get('id');

        $q = Plan_destination::where('id', $id)->first();

        if ($type == 'None'){
            $filter = Destination::where('id', '!=', $q->destination_id)->where('state', $state)->get();
        } else {
            $filter = Destination::where('id', '!=', $q->destination_id)->where('state', $state)->where('type', $type)->get();
        }

        return view($this->path . 'filterAddNew', ['destinations' => $filter, 'unique' => $uni, 'plan_id' => $plan_id ]);

    }


    public function storeEditAdd(Request $request, $plan_id){

        
        $day = $request->day + 1;

        $des = array();
        foreach ($request->destination as $dest){
            $des[] = $dest;
        }

        foreach ($request->destination as $dest_id){
            $planDest = new Plan_destination();
            $planDest->plan_id = $plan_id;
            $planDest->destination_id = $dest_id;
            $planDest->day = $day;
            $planDest->save();
        }

        return redirect()->route('plans.index');
        

    }



    // public function edit(Plan $plan) {
    //   $destination = $plan->destinations;
    //   dd($destination);

    // }


}
