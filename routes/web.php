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
			Route::resource('keywords', 'Admin\KeywordsController');
			Route::resource('keywordDestinations', 'Admin\KeywordDestinationsController');
			Route::resource('destinationCategories', 'Admin\DestinationCategoriesController');
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

//gallery views
Route::get('/gallery', 'Client\GalleryController@gallery')->name('gallery');
Route::get('/galleryPenang', 'Client\GalleryController@galleryPenang')->name('galleryPenang');
Route::get('/galleryPerak', 'Client\GalleryController@galleryPerak')->name('galleryPerak');
Route::get('/galleryPerlis', 'Client\GalleryController@galleryPerlis')->name('galleryPerlis');
Route::get('/galleryKedah', 'Client\GalleryController@galleryKedah')->name('galleryKedah');
Route::get('/galleryJohor', 'Client\GalleryController@galleryJohor')->name('galleryJohor');
Route::get('/galleryMelaka', 'Client\GalleryController@galleryMelaka')->name('galleryMelaka');
Route::get('/gallerySelangor', 'Client\GalleryController@gallerySelangor')->name('gallerySelangor');
Route::get('/galleryKL', 'Client\GalleryController@galleryKL')->name('galleryKL');
Route::get('/gallerySabah', 'Client\GalleryController@gallerySabah')->name('gallerySabah');
Route::get('/gallerySarawak', 'Client\GalleryController@gallerySarawak')->name('gallerySarawak');
Route::get('/galleryTerengganu', 'Client\GalleryController@galleryTerengganu')->name('galleryTerengganu');
Route::get('/galleryKelantan', 'Client\GalleryController@galleryKelantan')->name('galleryKelantan');
Route::get('/galleryPahang', 'Client\GalleryController@galleryPahang')->name('galleryPahang');

//gallery sight seeing
Route::get('/galleryPenangSightSeeing', 'Client\GalleryController@galleryPenangSightSeeing')->name('galleryPenangSightSeeing');
Route::get('/galleryPerakSightSeeing', 'Client\GalleryController@galleryPerakSightSeeing')->name('galleryPerakSightSeeing');
Route::get('/galleryPerlisSightSeeing', 'Client\GalleryController@galleryPerlisSightSeeing')->name('galleryPerlisSightSeeing');
Route::get('/galleryKedahSightSeeing', 'Client\GalleryController@galleryKedahSightSeeing')->name('galleryKedahSightSeeing');
Route::get('/galleryJohorSightSeeing', 'Client\GalleryController@galleryJohorSightSeeing')->name('galleryJohorSightSeeing');
Route::get('/galleryMelakaSightSeeing', 'Client\GalleryController@galleryMelakaSightSeeing')->name('galleryMelakaSightSeeing');
Route::get('/gallerySelangorSightSeeing', 'Client\GalleryController@gallerySelangorSightSeeing')->name('gallerySelangorSightSeeing');
Route::get('/galleryKLSightSeeing', 'Client\GalleryController@galleryKLSightSeeing')->name('galleryKLSightSeeing');
Route::get('/gallerySabahSightSeeing', 'Client\GalleryController@gallerySabahSightSeeing')->name('gallerySabahSightSeeing');
Route::get('/gallerySarawakSightSeeing', 'Client\GalleryController@gallerySarawakSightSeeing')->name('gallerySarawakSightSeeing');
Route::get('/galleryTerengganuSightSeeing', 'Client\GalleryController@galleryTerengganuSightSeeing')->name('galleryTerengganuSightSeeing');
Route::get('/galleryKelantanSightSeeing', 'Client\GalleryController@galleryKelantanSightSeeing')->name('galleryKelantanSightSeeing');
Route::get('/galleryPahangSightSeeing', 'Client\GalleryController@galleryPahangSightSeeing')->name('galleryPahangSightSeeing');

//gallery relaxation
Route::get('/galleryPenangRelaxation', 'Client\GalleryController@galleryPenangRelaxation')->name('galleryPenangRelaxation');
Route::get('/galleryPerakRelaxation', 'Client\GalleryController@galleryPerakRelaxation')->name('galleryPerakRelaxation');
Route::get('/galleryPerlisRelaxation', 'Client\GalleryController@galleryPerlisRelaxation')->name('galleryPerlisRelaxation');
Route::get('/galleryKedahRelaxation', 'Client\GalleryController@galleryKedahRelaxation')->name('galleryKedahRelaxation');
Route::get('/galleryJohorRelaxation', 'Client\GalleryController@galleryJohorRelaxation')->name('galleryJohorRelaxation');
Route::get('/galleryMelakaRelaxation', 'Client\GalleryController@galleryMelakaRelaxation')->name('galleryMelakaRelaxation');
Route::get('/gallerySelangorRelaxation', 'Client\GalleryController@gallerySelangorRelaxation')->name('gallerySelangorRelaxation');
Route::get('/galleryKLRelaxation', 'Client\GalleryController@galleryKLRelaxation')->name('galleryKLRelaxation');
Route::get('/gallerySabahRelaxation', 'Client\GalleryController@gallerySabahRelaxation')->name('gallerySabahRelaxation');
Route::get('/gallerySarawakRelaxation', 'Client\GalleryController@gallerySarawakRelaxation')->name('gallerySarawakRelaxation');
Route::get('/galleryTerengganuRelaxation', 'Client\GalleryController@galleryTerengganuRelaxation')->name('galleryTerengganuRelaxation');
Route::get('/galleryKelantanRelaxation', 'Client\GalleryController@galleryKelantanRelaxation')->name('galleryKelantanRelaxation');
Route::get('/galleryPahangRelaxation', 'Client\GalleryController@galleryPahangRelaxation')->name('galleryPahangRelaxation');

//gallery cultural
Route::get('/galleryPenangCultural', 'Client\GalleryController@galleryPenangCultural')->name('galleryPenangCultural');
Route::get('/galleryPerakCultural', 'Client\GalleryController@galleryPerakCultural')->name('galleryPerakCultural');
Route::get('/galleryPerlisCultural', 'Client\GalleryController@galleryPerlisCultural')->name('galleryPerlisCultural');
Route::get('/galleryKedahCultural', 'Client\GalleryController@galleryKedahCultural')->name('galleryKedahCultural');
Route::get('/galleryJohorCultural', 'Client\GalleryController@galleryJohorCultural')->name('galleryJohorCultural');
Route::get('/galleryMelakaCultural', 'Client\GalleryController@galleryMelakaCultural')->name('galleryMelakaCultural');
Route::get('/gallerySelangorCultural', 'Client\GalleryController@gallerySelangorCultural')->name('gallerySelangorCultural');
Route::get('/galleryKLCultural', 'Client\GalleryController@galleryKLCultural')->name('galleryKLCultural');
Route::get('/gallerySabahCultural', 'Client\GalleryController@gallerySabahCultural')->name('gallerySabahCultural');
Route::get('/gallerySarawakCultural', 'Client\GalleryController@gallerySarawakCultural')->name('gallerySarawakCultural');
Route::get('/galleryTerengganuCultural', 'Client\GalleryController@galleryTerengganuCultural')->name('galleryTerengganuCultural');
Route::get('/galleryKelantanCultural', 'Client\GalleryController@galleryKelantanCultural')->name('galleryKelantanCultural');
Route::get('/galleryPahangCultural', 'Client\GalleryController@galleryPahangCultural')->name('galleryPahangCultural');

//gallery adventurous
Route::get('/galleryPenangAdventurous', 'Client\GalleryController@galleryPenangAdventurous')->name('galleryPenangAdventurous');
Route::get('/galleryPerakAdventurous', 'Client\GalleryController@galleryPerakAdventurous')->name('galleryPerakAdventurous');
Route::get('/galleryPerlisAdventurous', 'Client\GalleryController@galleryPerlisAdventurous')->name('galleryPerlisAdventurous');
Route::get('/galleryKedahAdventurous', 'Client\GalleryController@galleryKedahAdventurous')->name('galleryKedahAdventurous');
Route::get('/galleryJohorAdventurous', 'Client\GalleryController@galleryJohorAdventurous')->name('galleryJohorAdventurous');
Route::get('/galleryMelakaAdventurous', 'Client\GalleryController@galleryMelakaAdventurous')->name('galleryMelakaAdventurous');
Route::get('/gallerySelangorAdventurous', 'Client\GalleryController@gallerySelangorAdventurous')->name('gallerySelangorAdventurous');
Route::get('/galleryKLAdventurous', 'Client\GalleryController@galleryKLAdventurous')->name('galleryKLAdventurous');
Route::get('/gallerySabahAdventurous', 'Client\GalleryController@gallerySabahAdventurous')->name('gallerySabahAdventurous');
Route::get('/gallerySarawakAdventurous', 'Client\GalleryController@gallerySarawakAdventurous')->name('gallerySarawakAdventurous');
Route::get('/galleryTerengganuAdventurous', 'Client\GalleryController@galleryTerengganuAdventurous')->name('galleryTerengganuAdventurous');
Route::get('/galleryKelantanAdventurous', 'Client\GalleryController@galleryKelantanAdventurous')->name('galleryKelantanAdventurous');
Route::get('/galleryPahangAdventurous', 'Client\GalleryController@galleryPahangAdventurous')->name('galleryPahangAdventurous');

//gallery food
Route::get('/galleryPenangFood', 'Client\GalleryController@galleryPenangFood')->name('galleryPenangFood');
Route::get('/galleryPerakFood', 'Client\GalleryController@galleryPerakFood')->name('galleryPerakFood');
Route::get('/galleryPerlisFood', 'Client\GalleryController@galleryPerlisFood')->name('galleryPerlisFood');
Route::get('/galleryKedahFood', 'Client\GalleryController@galleryKedahFood')->name('galleryKedahFood');
Route::get('/galleryJohorFood', 'Client\GalleryController@galleryJohorFood')->name('galleryJohorFood');
Route::get('/galleryMelakaFood', 'Client\GalleryController@galleryMelakaFood')->name('galleryMelakaFood');
Route::get('/gallerySelangorFood', 'Client\GalleryController@gallerySelangorFood')->name('gallerySelangorFood');
Route::get('/galleryKLFood', 'Client\GalleryController@galleryKLFood')->name('galleryKLFood');
Route::get('/gallerySabahFood', 'Client\GalleryController@gallerySabahFood')->name('gallerySabahFood');
Route::get('/gallerySarawakFood', 'Client\GalleryController@gallerySarawakFood')->name('gallerySarawakFood');
Route::get('/galleryTerengganuFood', 'Client\GalleryController@galleryTerengganuFood')->name('galleryTerengganuFood');
Route::get('/galleryKelantanFood', 'Client\GalleryController@galleryKelantanFood')->name('galleryKelantanFood');
Route::get('/galleryPahangFood', 'Client\GalleryController@galleryPahangFood')->name('galleryPahangFood');

//gallery shopping
Route::get('/galleryPenangShopping', 'Client\GalleryController@galleryPenangShopping')->name('galleryPenangShopping');
Route::get('/galleryPerakShopping', 'Client\GalleryController@galleryPerakShopping')->name('galleryPerakShopping');
Route::get('/galleryPerlisShopping', 'Client\GalleryController@galleryPerlisShopping')->name('galleryPerlisShopping');
Route::get('/galleryKedahShopping', 'Client\GalleryController@galleryKedahShopping')->name('galleryKedahShopping');
Route::get('/galleryJohorShopping', 'Client\GalleryController@galleryJohorShopping')->name('galleryJohorShopping');
Route::get('/galleryMelakaShopping', 'Client\GalleryController@galleryMelakaShopping')->name('galleryMelakaShopping');
Route::get('/gallerySelangorShopping', 'Client\GalleryController@gallerySelangorShopping')->name('gallerySelangorShopping');
Route::get('/galleryKLShopping', 'Client\GalleryController@galleryKLShopping')->name('galleryKLShopping');
Route::get('/gallerySabahShopping', 'Client\GalleryController@gallerySabahShopping')->name('gallerySabahShopping');
Route::get('/gallerySarawakShopping', 'Client\GalleryController@gallerySarawakShopping')->name('gallerySarawakShopping');
Route::get('/galleryTerengganuShopping', 'Client\GalleryController@galleryTerengganuShopping')->name('galleryTerengganuShopping');
Route::get('/galleryKelantanShopping', 'Client\GalleryController@galleryKelantanShopping')->name('galleryKelantanShopping');
Route::get('/galleryPahangShopping', 'Client\GalleryController@galleryPahangShopping')->name('galleryPahangShopping');

//recommendation page
Route::get('/recommendation', 'Client\RecommendationsController@datepicker')->name('datepicker');
Route::post('/recommendation/date','Client\RecommendationsController@saveDate')->name('saveDate');
Route::get('/recommendation/test', 'Client\RecommendationsController@test')->name('test');
Route::get('/destinationRecommendations', 'Client\RecommendationsController@viewDestinations')->name('destinationRecommendations');
Route::post('/selectedDestinations', 'Client\RecommendationsController@saveChosenDestinations')->name('saveChosenDestinations');
Route::get('/recommendation2', 'Client\RecommendationsController@showRecommendations')->name('showRecommendations');
Route::get('/showDestinations', 'Client\RecommendationsController@showDestinations')->name('showDestinations');

Route::resource('plans', 'Client\PlansController');

// Route::get('importExport', 'Admin\DestinationsController@importExport');
// 			Route::get('downloadExcel/{type}', 'Admin\DestinationsController@downloadExcel');
// 			Route::post('importExcel', 'Admin\DestinationsController@importExcel');

//first one is the url, the second one is which controller it is in charge of, the third one name, is the name of the route(like a short formed version)

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/test2', function() {

	return view('test');
});
Route::get('/test3', function() {

	return view('test2');
});