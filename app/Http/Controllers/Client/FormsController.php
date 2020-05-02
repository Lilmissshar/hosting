<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Form;
use App\Services\Client\FormsService;

class FormsController extends Controller{

	protected $formService;
	protected $path = 'client.';

   	public function __construct(FormsService $formService) {
   		$this->formService = $formService;
  	}

    public function showForm(Request $request){
    	return view($this->path . 'form');
    }

    public function submitForm(Request $request){
    	return $this->formService->store($request);
    }
}
