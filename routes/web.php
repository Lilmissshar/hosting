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
		// Route::resource('teams', 'Admin\TeamsController', ['only' => ['index', 'create', 'store', 'destroy']]);

		// //view customer feedbacks
		// Route::resource('forms', 'Admin\FormsController', ['only' => ['index', 'show']]);

		// //Museum, create, delete, view, edit
		// Route::resource('museums', 'Admin\MuseumsController');
		// //resource creates the create, delete, view, edit, show, update

		//delete and view all Users ( client )
		// Route::resource('clients', 'Admin\TeamsController', ['only' => ['index', 'destroy']]);
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
			Route::resource('keywords', 'Admin\KeywordsController');
			Route::resource('keywordDestinations', 'Admin\KeywordDestinationsController');
			Route::resource('destinationCategories', 'Admin\DestinationCategoriesController');
			Route::resource('reviews', 'Admin\ReviewsController');
			//destination importexport
			Route::get('importExport', 'Admin\DestinationsController@importExport')->name('destination.importExport');
			Route::get('downloadExcel/{type}', 'Admin\DestinationsController@downloadExcel')->name('destination.downloadExcel');
			Route::post('importExcel', 'Admin\DestinationsController@importExcel')->name('destination.importExcel');
			//keyword importexport
			Route::get('importExportKeyword', 'Admin\KeywordsController@importExport')->name('keyword.importExport');
			Route::get('downloadExcelKeyword/{type}', 'Admin\KeywordsController@downloadExcel')->name('keyword.downloadExcel');
			Route::post('importExcelKeyword', 'Admin\KeywordsController@importExcel')->name('keyword.importExcel');
			//keyword destination import export
			Route::get('importExportKeywordDestination', 'Admin\KeywordDestinationsController@importExport')->name('keywordDestination.importExport');
			Route::get('downloadExcelKeywordDestination/{type}', 'Admin\KeywordDestinationsController@downloadExcel')->name('keywordDestination.downloadExcel');
			Route::post('importExcelKeywordDestination', 'Admin\KeywordDestinationsController@importExcel')->name('keywordDestination.importExcel');
			//destination categories import export
			Route::get('importExportDestinationCategories', 'Admin\DestinationCategoriesController@importExport')->name('destinationCategory.importExport');
			Route::get('downloadExcelDestinationCategories/{type}', 'Admin\DestinationCategoriesController@downloadExcel')->name('destinationCategory.downloadExcel');
			Route::post('importExcelDestinationCategories', 'Admin\DestinationCategoriesController@importExcel')->name('destinationCategory.importExcel');

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

//Client authentication
Route::get('clientRegister', 'Client\AuthController@viewRegister')->name('client.register.show');
Route::post('clientRegister', 'Client\AuthController@Register')->name('client.register');
Route::get('clientLogin', 'Client\AuthController@viewLogin')->name('client.login.show');
Route::post('clientLogin', 'Client\AuthController@login')->name('client.login');

//Client account settings
Route::get('clientSettings', 'Client\AccountSettingsController@viewAccount')->name('client.account.show');
Route::post('clientSettings', 'Client\AccountSettingsController@updateAccount')->name('client.account.update');
Route::put('clientSettings/password', 'Client\AccountSettingsController@updatePassword')->name('client.password.change');
Route::get('logoutC', 'Client\AuthController@logout')->name('client.logout');


//home
Route::get('/', 'Client\HomeController@home')->name('root');
Route::get('/home', 'Client\HomeController@home')->name('home');

//gallery page
Route::get('/gallery', 'Client\GalleryController@gallery')->name('gallery');
Route::post('/filter', 'Client\GalleryController@filter')->name('filter');


//recommendation page
Route::get('/recommendation', 'Client\RecommendationsController@datepicker')->name('datepicker');
Route::post('/recommendation/date','Client\RecommendationsController@saveDate')->name('saveDate');
Route::get('/recommendation/test', 'Client\RecommendationsController@test')->name('test');
Route::get('/destinationRecommendations', 'Client\RecommendationsController@viewDestinations')->name('destinationRecommendations');
Route::post('/selectedDestinations', 'Client\RecommendationsController@saveChosenDestinations')->name('saveChosenDestinations');
Route::get('/recommendation2', 'Client\RecommendationsController@showRecommendations')->name('showRecommendations');
Route::get('/showDestinations', 'Client\RecommendationsController@showDestinations')->name('showDestinations');
Route::get('/save', 'Client\RecommendationsController@save')->name('destinations.save');

//edit Plan routes
Route::resource('plans', 'Client\PlansController');
// Route::get('/editDestinations/', 'Client\PlansController@editDestinations')->name('editDestinations');
Route::post('/chosen', 'Client\PlansController@chosen')->name('chosen');
Route::get('/editArray', 'Client\PlansController@editDay')->name('editDay');
Route::get('/editSpecifics/{id}', 'Client\PlansController@editSpecifics')->name('editSpecifics');
Route::post('/filterEditSpecifics', 'Client\PlansController@filterEditSpecifics')->name('filterEditSpecifics');
Route::get('/addNew/{id}', 'Client\PlansController@editAdd')->name('editAdd');
Route::post('/filterAdd{plan_id}', 'Client\PlansController@filterAdd')->name('filterAdd');
Route::post('/add/{plan_id}', 'Client\PlansController@storeEditAdd')->name('storeEditAdd');


Route::resource('dests', 'Client\DestinationsController');

//review routes
Route::get('reviews.index/{id}', 'Client\ReviewsController@index')->name('reviews.index');
Route::post('/review.store', 'Client\ReviewsController@store')->name('reviews.store');
Route::get('/review.create', 'Client\ReviewsController@create')->name('reviews.create');
// Route::resource('reviews', 'Client\ReviewsController');

//first one is the url, the second one is which controller it is in charge of, the third one name, is the name of the route(like a short formed version)


//testing routes
Route::get('/test', function () {
    return view('welcome');
});

Route::get('/test2', function() {

	return view('test');
});
Route::get('/test3', function() {

	return view('test2');
});