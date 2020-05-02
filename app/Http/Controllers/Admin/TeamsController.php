<?php

namespace App\Http\Controllers\Admin;

use App\User as TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TeamServices;

class TeamsController extends Controller{

	protected $path = 'admin.teams.';
	protected $teamServices;

	public function __construct(TeamServices $teamServices){
		$this->teamServices = $teamServices;
	}

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
		if ($request->isJson()) {
			ret.$this->teamServices->all($request);
		}
		return view($this->path . 'index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
		return view($this->path . 'create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
		$this->validate($request, [
			"email" => "required|email|unique:users",
			"name" => "required",
		]);

		$teamMember = new TeamMember();
		$teamMember->name = $request->name;
		$teamMember->email = $request->email;
		$teamMember->role = 1;
		$teamMember->password = bcrypt('secret');;
		$teamMember->save();

		return redirect()->route('teams.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $teamMember
   * @return \Illuminate\Http\Response
   */
  public function destroy(TeamMember $teamMember){
    $teamMember->delete();

		return success();
  }
}
