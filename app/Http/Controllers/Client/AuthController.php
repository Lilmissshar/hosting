<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;

class AuthController extends Controller{

	public function viewRegister(){
    return view('client.auth.register');
  }

  public function register(Request $request){
	  $this->validate($request, [
	    "email" => "required|email|unique:users",
	    "name" => "required",
	    "password" => "required|confirmed",
	    "mobile"=> "required"
	  ]);

	  $user = User::create($request->all());
	  $user->save();
	  Auth::login($user);

	  return redirect()->route('home');
	}

	public function viewLogin(){
	  return view('client.auth.login');
	}

	public function login(Request $request){
	  $this->validate($request, [
	    "email" => "required|email",
	    "password" => "required"
	  ]);

	  if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
	    return redirect()->route('home');
	  }else{
	    return redirect()->back()->withErrors(['message' => 'Email or password is incorrect']);
	  }
	}

	public function logout(){
	  Auth::logout();

	  return redirect()->route('client.login.show');
	}







}
