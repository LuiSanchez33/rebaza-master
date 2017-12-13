<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['auth'], 'prefix' => 'private'], function ($route) {

    $route->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    $route->post('update-home-info', ['as' => 'updateHomeInfo', 'uses' => 'HomeController@updateHomeData']);
    $route->get('articles/{status}/status', ['as' => 'articles', 'uses' => 'HomeController@articles']);
    $route->get('add-article', ['as' => 'addArticle', 'uses' => 'HomeController@add']);
    $route->post('add-article', ['as' => 'storeArticle', 'uses' => 'HomeController@store']);

    $route->get('edit-article/{id}', ['as' => 'editArticle', 'uses' => 'HomeController@edit']);
    $route->post('update-article/{id}', ['as' => 'updateArticle', 'uses' => 'HomeController@update']);
    $route->get('delete-article/{id}', ['as' => 'deleteArticle', 'uses' => 'HomeController@delete']);
    $route->get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

    // Noticias Home
	$route->get('home-notices/create', ['as' => 'addNotice', 'uses' => 'HomeController@homeCreate']);
	$route->get('home-notices/{id}/view', ['as' => 'editNotice', 'uses' => 'HomeController@homeArticlesView']);

    // Lawyer
    $route->get('lawyers/{type}', ['as' => 'lawyers', 'uses' => 'LawyerController@index']);
    $route->get('lawyers/create/{type}', ['as' => 'addLawyer', 'uses' => 'LawyerController@create']);
    $route->post('lawyers/store', ['as' => 'storeLawyer', 'uses' => 'LawyerController@store']);
    $route->get('lawyers/{id}/view', ['as' => 'showLawyer', 'uses' => 'LawyerController@show']);
    $route->post('lawyers/{id}/edit', ['as' => 'editLawyer', 'uses' => 'LawyerController@edit']);
	$route->get('lawyers/{id}/activate', ['as' => 'activateLawyer', 'uses' => 'LawyerController@update']);
	$route->get('lawyers/{id}/inactivate', ['as' => 'inactivateLawyer', 'uses' => 'LawyerController@inactivate']);
	$route->get('lawyers/{id}/force-delete', ['as' => 'destroyLawyer', 'uses' => 'LawyerController@destroy']);
	$route->get('lawyers/{id}/delete-cv/{lang}', ['as' => 'destroyLawyerCv', 'uses' => 'LawyerController@deleteCv']);

	// Pages
    $route->get('page/{page}', ['as' => 'pageIndex', 'uses' => 'PageController@index']);
    $route->get('pages/create-{type}', ['as' => 'pageCreate', 'uses' => 'PageController@create']);
    $route->get('pages/{type}/{id}/show', ['as' => 'areaShow', 'uses' => 'PageController@show']);
    $route->post('pages/store', ['as' => 'storeArea', 'uses' => 'PageController@store']);
    $route->post('pages/{id}/update', ['as' => 'areaEdit', 'uses' => 'PageController@edit']);
    $route->get('pages/{id}/delete', ['as' => 'areaDelete', 'uses' => 'PageController@destroy']);

    // Quotes
    $route->get('testimonios', ['as' => 'quoteIndex', 'uses' => 'QuoteController@index']);
    $route->get('testimonios/form-admin', ['as' => 'quoteAdmin', 'uses' => 'QuoteController@create']);
    $route->post('testimonios/store', ['as' => 'quoteStore', 'uses' => 'QuoteController@store']);
    $route->get('testimonios/{id}/edit', ['as' => 'quoteEdit', 'uses' => 'QuoteController@edit']);
    $route->post('testimonios/{id}/update', ['as' => 'quoteUpdate', 'uses' => 'QuoteController@update']);
    $route->get('testimonios/{id}/delete', ['as' => 'quoteDelete', 'uses' => 'QuoteController@destroy']);

	// Offices
	$route->get('offices', ['as' => 'officesIndex', 'uses' => 'OfficeController@index']);
	$route->get('offices/create', ['as' => 'addOffice', 'uses' => 'OfficeController@create']);
	$route->post('offices/store', ['as' => 'storeOffice', 'uses' => 'OfficeController@store']);
	$route->get('offices/{id}/edit', ['as' => 'editOffice', 'uses' => 'OfficeController@edit']);
	$route->post('offices/{id}/update', ['as' => 'updateOffice', 'uses' => 'OfficeController@update']);
	$route->get('offices/{id}/delete', ['as' => 'deleteOffice', 'uses' => 'OfficeController@destroy']);

	// Gallery
	$route->get('gallery', ['as' => 'gaIndex', 'uses' => 'GalleryController@index']);
	$route->get('gallery/create', ['as' => 'addGallery', 'uses' => 'GalleryController@create']);
	$route->post('gallery/store', ['as' => 'storeGallery', 'uses' => 'GalleryController@store']);
	$route->get('gallery/{id}/edit', ['as' => 'editGallery', 'uses' => 'GalleryController@edit']);
	$route->post('gallery/{id}/update', ['as' => 'updateGallery', 'uses' => 'GalleryController@update']);
	$route->get('gallery/{id}/destroy', ['as' => 'deleteGallery', 'uses' => 'GalleryController@destroy']);

	// Others Images
	$route->get('others-images', ['as' => 'othersIndex', 'uses' => 'OtherImagesController@index']);
	$route->get('others-images/{id}/delete', ['as' => 'othersDelete', 'uses' => 'OtherImagesController@destroy']);
	$route->post('others-images/store', ['as' => 'othersStore', 'uses' => 'OtherImagesController@store']);
	$route->post('others-images/{id}/update', ['as' => 'othersUpdate', 'uses' => 'OtherImagesController@update']);

	// Rse Gallery
	$route->get('rse-images', ['as' => 'rseIndex', 'uses' => 'RseController@index']);
	$route->get('rse-images/create', ['as' => 'rseCreate', 'uses' => 'RseController@create']);
	$route->post('rse-images/store', ['as' => 'rseStore', 'uses' => 'RseController@store']);
	$route->get('rse-images/{id}/edit', ['as' => 'rseShow', 'uses' => 'RseController@show']);
	$route->post('rse-images/{id}/update', ['as' => 'rseUpdate', 'uses' => 'RseController@edit']);
	$route->get('rse-images/{id}/delete', ['as' => 'rseDelete', 'uses' => 'RseController@destroy']);
});

$locale = 'es';
if (Cache::has('locale')) {
	$locale = Cache::get('locale');
	App::setLocale($locale);
}

Route::get('/user-intranet/CS90PRD/cmd=login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', 'Auth\AuthController@postLogin');

// Password reset
Route::get('/user-intranet/CS90PRD/password-recovery', ['as' => 'pass-recovery', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('/record-intranet/PFHE5RD/send-password-recovery', ['as' => 'send-pass-recovery', 'uses' => 'Auth\PasswordController@postEmail']);
Route::get('/user-intranet/WS90U4D/{token}/recovery', ['as' => 'get-token', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('/user-intranet/CS90QTR/reset-password', ['as' => 'reset-token', 'uses' => 'Auth\PasswordController@postReset']);

Route::get('language', ['as' => 'changeLocale', 'uses' => 'WelcomeController@changeLocale']);

Route::get('/', ['as' => 'index', 'uses' => 'WelcomeController@index']);
Route::get('abogadoasociados', ['as' => 'abogadoasociados', 'uses' => 'WelcomeController@abogadoasociados']);
Route::get('abogadoconsultores', ['as' => 'abogadoconsultores', 'uses' => 'WelcomeController@abogadoconsultores']);
Route::get('abogadosocios', ['as' => 'abogadosocios', 'uses' => 'WelcomeController@abogadosocios']);

Route::get('estudiodiferencia', ['as' => 'estudiodiferencia', 'uses' => 'WelcomeController@estudiodiferencia']);
Route::get('galeria', ['as' => 'galeria', 'uses' => 'WelcomeController@galeria']);
Route::get('oficinas', ['as' => 'oficinas', 'uses' => 'WelcomeController@oficinas']);
Route::get('reconocimiento', ['as' => 'reconocimiento', 'uses' => 'WelcomeController@reconocimiento']);
Route::get('responsabilidadsocial', ['as' => 'responsabilidadsocial', 'uses' => 'WelcomeController@responsabilidadsocial']);
Route::get('trabajaformulario', ['as' => 'trabajaformulario', 'uses' => 'WelcomeController@trabajaformulario']);

Route::get('{page}', ['as' => 'pagesByUrl', 'uses' => 'WelcomeController@pages']);

Route::post('send-cv', ['as' => 'sendCv', 'uses' => 'WelcomeController@sendCv']);