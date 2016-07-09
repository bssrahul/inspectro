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



Route::get('/','HomeController@index');
// Route::get('pages/{slug?}', 'PagesController@view');
Route::get('serviceslist', 'HomeController@serviceList');
Route::get('pages/{slug}', [
    'as' => 'pages', 'uses' => 'PagesController@view'
]);

// Route::post('serviceslist', ['as' => 'servicesList', 'uses' => 'HomeController@serviceList']);


