<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\DestinationsService; 

class DestinationsController extends Controller
{
    protected $path = 'admin.destinations.';
    protected $destinationsService;

    public function __construct(DestinationsService $destinationsService){
        $this->destinationService = $destinationsService;
      } 

    public function index(Request $request){
    if ($request->isJson()) {
      return $this->destinationService->all($request);
    }
    return view($this->path . 'index');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path . 'create');
    }
    public function show() {
        dd('ghi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "user_id" => "required"
        ]);

        $destination = new Destination(); 
        $destination->name = $request->name;
        $destination->user_id = $request->user_id;
        $destination->save();

        return redirect()->route('destinations.index');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination){
    return view($this->path . 'edit', ['destination' => $destination]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination) {
    return $this->destinationService->update($request, $list);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return success();
    }
}
