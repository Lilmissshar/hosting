<?php

namespace App\Http\Controllers\Admin;

use App\KeywordDestination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\KeywordDestinationsService; 
use Excel;

class KeywordDestinationsController extends Controller
{
    protected $path = 'admin.keywordDestinations.';
    protected $keywordDestinationsService;

    public function __construct(KeywordDestinationsService $keywordDestinationsService){
        $this->keywordDestinationService = $keywordDestinationsService;
      } 

    public function index(Request $request){
    if ($request->wantsJson()) {
      return $this->keywordDestinationService->all($request);
    }
    return view($this->path . 'index');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view($this->path . 'create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     return $this->keywordService->store($request);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Museum  $museum
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Keyword $keyword){
    // return view($this->path . 'edit', ['keyword' => $keyword]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Museum  $museum
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Keyword $keyword) {
    // return $this->keywordService->update($request, $keyword);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Museum  $museum
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Keyword $keyword)
    // {
    //     $keyword->delete();

    //     return success();
    // }

        public function importExport(){
        return view ($this->path . 'importExport');
    }

    public function downloadExcel($type){

        $data = KeywordDestination::get()->toArray();

        return Excel::create('keywordDestination_database', function($excel) use ($data) {
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
                $arr[] = ['keyword_id' => $value->keyword_id, 'destination_id' => $value->destination_id];
            }
 
            if(!empty($arr)){
                KeywordDestination::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }
}
