<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\PlansService; 

class PlansController extends Controller
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


}
