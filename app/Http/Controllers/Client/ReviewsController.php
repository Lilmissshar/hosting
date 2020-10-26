<?php

namespace App\Http\Controllers\Client;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\PlansService; 

class ReviewsController extends Controller
{
    protected $path = 'admin.plans.';
    protected $plansService;

    public function __construct(PlansService $plansService){
        $this->planService = $plansService;
      } 

    public function index(Request $request){
      if ($request->isJson()) {
        return $this->planService->all($request);
      }
      return view($this->path . 'index');
    }

    public function create()
    {
      return view($this->path . 'create');
    }

    public function store(Request $request)
    {
      return $this->planService->store($request);
    }

    // public function edit(Plan $plan) {
    //   $destination = $plan->destinations;
    //   dd($destination);

    // }


}
