<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\DestinationsService; 
use Excel;

class DestinationsController extends Controller
{
    protected $path = 'admin.destinations.';
    protected $destinationsService;

    public function __construct(DestinationsService $destinationsService){
        $this->destinationService = $destinationsService;
      } 

    public function index(Request $request){
    if ($request->wantsJson()) {
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
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        return $this->destinationService->store($request);
    }
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination){
        
        $categories = $destination->category;
        return view($this->path . 'edit', ['destination' => $destination, 'categories' => $categories ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination) {
        return $this->destinationService->update($request, $destination);
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

    public function importExport(){
        return view ($this->path . 'importExport');
    }

    public function downloadExcel($type){

        $data = Destination::get()->toArray();

        return Excel::create('destination_database', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
 
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['name' => $value->title, 'description' => $value->description, 'state' => $value->state, 'type' => $value->type];
            }
 
            if(!empty($arr)){
                Destination::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }

    public function test(){
        $categories = Category::latest()->get();
        return response()->json($users, 200);
    }
}
