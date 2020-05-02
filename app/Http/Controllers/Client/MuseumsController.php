<?php

namespace App\Http\Controllers\Client;

use App\Museum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Client\MuseumsService; 

class MuseumsController extends Controller
{
    protected $museumsService;

    public function __construct(MuseumsService $museumsService){
        $this->museumsService = $museumsService;
      } //this museumsService a type of museumservice 

    public function index(Request $request){
      return $this->museumsService->all($request);
      //what is $this representing 
  }
}
