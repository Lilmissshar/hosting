<?php

namespace App\Services\Client;
use App\Form;
use App\Address;
use App\FormMuseum;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class FormsService extends TransformerService {

	public function store(Request $request) {
        // dd($request->museums);
        //dd($request->museum_ids);
		$data = $request->validate([
			"name" => "required",
    		"email" => "required|email|unique:forms",
    		"mobile" => "required",
            "addresses" => "required",
    		"overall_rating" => "required",
    		"guide_rating" => "required",
    		"improvements" => "required",
            "museum_ids" => "required"

    	]);

		$form = new Form();
    	$form->name = $request->name;
    	$form->email = $request->email;
    	$form->mobile = $request->mobile;
    	$form->overall_rating = $request->overall_rating;
    	$form->guide_rating = $request->guide_rating;
    	$form->improvements = $request->improvements;
    	$form->save();

    	foreach($request->addresses as $address){
    		$newAddress = new Address();
    		$newAddress->form_id = $form->id;
    		$newAddress->name = $address;
    		$newAddress->save();
    	}

        foreach($request->museum_ids as $id){
            $museumChosen = new FormMuseum();
            $museumChosen->form_id = $form->id;
            $museumChosen->museum_id = $id;
            $museumChosen->save();
        }

		return redirect()->route('form.show')->with('success, successfully saves');
	}

	public function transform($form){
		return [
			'name' => $form->name];
	}
}