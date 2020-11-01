<?php

namespace App\Http\Controllers\Client;

use App\Destination;
use App\Destination_category;
use App\KeywordDestination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestinationsController extends Controller
{
    protected $path = 'client.destinations.';


    public function index(Request $request){  
        return view($this->path . 'index');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => "required",
            'description' => "required",
            "state" => "required",
            "type" => "required"
        ]);

        $destination = new Destination(); 
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->state = $request->state;
        $destination->type = $request->type;

        if ($request->file('image')){
            $imageName = $request->pictureName . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/destinations'), $imageName);
            $destination->picture = $imageName;
            $destination->save();
        } else {
            $destination->save();
        }


        foreach($request->category_id as $id){
            $destinationCategory = new Destination_category();
            $destinationCategory->destination_id = $destination->id;
            $destinationCategory->category_id = $id;
            $destinationCategory->save();
        }

        foreach($request->keyword_id as $kid){
            $keywordCategory = new KeywordDestination();
            $keywordCategory->destination_id = $destination->id;
            $keywordCategory->keyword_id = $id;
            $keywordCategory->save();
        }

        return redirect()->route('home');
     }
    
}
