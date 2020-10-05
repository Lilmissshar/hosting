<?php

namespace App\Http\Controllers\Client;

use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageOptimizationServices;

use App\User;

class AccountSettingsController extends Controller {
	protected $path = 'client.auth.';
	protected $imageOptimizationServices;

	function __construct(ImageOptimizationServices $imageOptimizationServices){
		$this->imageOptimizationServices = $imageOptimizationServices;
	}

	public function viewAccount(){
		return view($this->path . 'client-account-settings');
	}

	public function updateAccount(Request $request){
		$this->validate($request, array(
			'name' => 'required|string|max:191',
		));

		$client = current_user();

		if ($request->hasFile('avatar') && $request->file('avatar')->isValid()){
			if ( $client->avatar ) {
				if (avatar_picture_exists($client->piavatarcture)) {
					Storage::delete( avatar_storage_path() . $client->avatar );
				}
			}
			$file_unique_name = $this->imageOptimizationServices->optimize('avatars', $request->avatar, 'thumbnail');
      $client->avatar = $file_unique_name;
    }

    $client->name = $request->name;
    $client->save();

    return redirect()->back()->with("success", " Account Has Been Updated Successfully!");
	}

	public function updatePassword(Request $request) {
		$client = current_user();

		if (!(Hash::check($request->get('current_password'), $client->password))) {
			//The passwords do not match
			return redirect()->back()->with("error", "Your current password does not match with the password you provided. Please try again.");
		}

		if(strcmp($request->get('current_password'), $request->get('password')) == 0){
			//Current password and new password are same
			return redirect()->back()->with("error", "New password cannot be the same as your current password. Please choose a different password.");
		}

		$validator = Validator::make($request->all(), [
			'current_password' => 'required',
			'password' => 'required|min:6|confirmed',]);

		if ($validator->fails()) {
			return redirect()->back()->with("error", "Password is not valid. Please ensure that it has a minimum of 6 characters and that the password and password confirmation matches.");
		}

		//Change Password
		$client->password = bcrypt($request->get('password'));
		$client->save();

		return redirect()->back()->with("success", "Password changed successfully!");
	}


}