<?php

namespace App\Http\Controllers\Client;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ReviewsController extends Controller
{
    protected $path = 'client.reviews.';
    
    public function index(Review $review, $id){

      Session::put('plan_id', $id);

      return redirect()->route('reviews.create');
      
    }

    public function create(Review $review){

      return view($this->path . 'index', ['review' => $review]);
    }
 


    public function store(Request $request, Review $review)
    {

      $plan_id = Session::get('plan_id');

      $review = new Review();
      $review->user_id = current_user()->id;
      $review->plan_id = $plan_id;
      $review->review = $request->review;
      $review->save();

      return redirect()->route('plans.index');


      
    }



}
