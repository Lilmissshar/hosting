<?php

namespace App\Http\Controllers\Admin;

use App\Museum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\MuseumsService; 

class MuseumsController extends Controller
{
    protected $path = 'admin.museums.';
    protected $museumsService;

    public function __construct(MuseumsService $museumsService){
        $this->museumsService = $museumsService;
      }

    public function index(Request $request){
    if ($request->isJson()) {
      return $this->museumsService->all($request);
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
        ]);

        $newMuseum = new Museum(); //creating a new object in the museum database to be stored when the user enters the data which is under the variable $newMuseum
        $newMuseum->museumName = $request->name; //what this
        $newMuseum->save();

        return redirect()->route('museums.index');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum){
    return view($this->path . 'edit', ['museum' => $museum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum) {
    return $this->museumsService->update($request, $museum);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        $museum->delete();

        return success();
    }
}
