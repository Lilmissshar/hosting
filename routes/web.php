<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Routes
Route::prefix('admin')->group(function(){

	//register
  Route::middleware('register.access')->group(function(){
    Route::get('register', "Admin\AuthController@viewRegister")->name('admin.register.show');
    Route::post('register', "Admin\AuthController@register")->name('admin.register');
  });

	//Login
	Route::get('login', 'Admin\AuthController@viewLogin')->name('admin.login.show');
	Route::post('login', 'Admin\AuthController@login')->name('admin.login');

	Route::middleware('admin.auth')->group(function(){

		Route::get('/', 'Admin\DashboardController@dashboard');
		//dashboard
		Route::get('dashboard','Admin\DashboardController@dashboard')->name('dashboard');

		//create, delete, and view all Admins team
		Route::resource('teams', 'Admin\TeamsController', ['only' => ['index', 'create', 'store', 'destroy']]);

		//view customer feedbacks
		Route::resource('forms', 'Admin\FormsController', ['only' => ['index', 'show']]);

		//Museum, create, delete, view, edit
		Route::resource('museums', 'Admin\MuseumsController');
		//resource creates the create, delete, view, edit, show, update

		//delete and view all Users ( client )
		Route::resource('clients', 'Admin\TeamsController', ['only' => ['index', 'destroy']]);
		//the only is to specify that only the index and the delete is created, the others are not created

		Route::get('logout', 'Admin\AuthController@logout')->name('admin.logout');

		//Settings
		Route::get('settings', "Admin\AccountSettingsController@viewAccount")->name("admin.account.show");
		//get is to get the information, send information also can 
		Route::post('settings', "Admin\AccountSettingsController@updateAccount")->name("admin.account.update");
		//post is to create something new
		Route::put('settings/password', "Admin\AccountSettingsController@updatePassword")->name("admin.password.change");
		//put is to edit the information 

		Route::name('admin.')->group(function(){

			Route::resource('plans', 'Admin\PlansController');
			Route::resource('categories','Admin\CategoriesController');
			Route::resource('destinations', 'Admin\DestinationsController');

		});
	});
});

//Client Routes
Route::get('form', 'Client\FormsController@showForm')->name('form.show');
Route::post('form', 'Client\FormsController@submitForm')->name('form.store');

Route::get('admin/museums/{museum}/edit', 'Admin\MuseumsController@edit')->name('museums.edit');
 Route::put('admin/museums/{museum}/update', 'Admin\MuseumsController@update')->name('museums.update');

 Route::post('museums', 'Client\MuseumsController@index')->name('client.museums.index');
 //museums is the url, which is used in the component script js part to link it to show the information of the museums aka the museumsName



Route::get('/', 'Client\HomeController@home')->name('root');
Route::get('/home', 'Client\HomeController@home')->name('home');
Route::get('/recommendation', 'Client\HomeController@datepicker')->name('datepicker');
Route::post('/recommendation/date','Client\HomeController@saveDate')->name('saveDate');

//first one is the url, the second one is which controller it is in charge of, the third one name, is the name of the route(like a short formed version)

Route::get('/test', function () {
    return view('welcome');
});