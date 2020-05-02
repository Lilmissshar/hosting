<?php

namespace App\Http\Controllers\Admin;

use App\Form;
Use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\FormsService;

class FormsController extends Controller{

  protected $path = 'admin.feedback.';
  protected $formsService;

  public function __construct(FormsService $formsService){
    $this->formsService = $formsService;
  }
	
  public function index(Request $request){
    if ($request->isJson()) {
      return $this->formsService->all($request);
    }
    return view($this->path . 'index');
  }

  public function show(Form $form) { //Form is the class $form is the variable
    $addresses = $form->addresses; //using the relationship to call the addresses
    $museums = $form->museums;
    return view($this->path . 'show', ['form' => $form, 'addresses' => $addresses, 'museums' => $museums]);
  }
}
