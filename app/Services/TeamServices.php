<?php

/**
 * Team Services That handle all the business logic releated to the team members in one place
 */

namespace App\Services;

use App\User as TeamMember;
use Illuminate\Http\Request;

class TeamServices extends TransformerService{

	public function all(Request $request){
		$sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $teamMembers = TeamMember::where('id', '!=', current_user()->id)->where('role', 1)->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $teamMembers->count();

    $teamMembers = $teamMembers->limit($limit)->offset($offset)->get();

    return respond(['rows' => $teamMembers, 'total' => $listCount]);
	}

	public function transform($teamMember){
		return [
			'id' => $teamMember->id,
			'name' => $teamMember->name,
			'email' => $teamMember->email,
			'avatar' => avatar_picture_url($teamMember->avatar),
			'join_date' => date_to_human($teamMember->created_at),
		];
	}
}
