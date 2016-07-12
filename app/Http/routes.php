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
Route::get('serviceslist', 'HomeController@serviceList');
Route::get('nextquestion', 'HomeController@nextQue');
Route::get('localstorage', 'HomeController@localStorage');
Route::get('stQfrontStorage', 'HomeController@stQfrontStorage');
Route::get('sendRequest', 'HomeController@sendRequest');
Route::get('cancelProject', 'HomeController@cancelProject');
Route::get('pages/{slug}', [
    'as' => 'pages', 'uses' => 'PagesController@view'
]);
Route::any('pages/{flag}', [
     'as' => 'pages', 'uses' => 'PagesController@contactMail'
]); 
Route::get('sendTestMail', 'HomeController@sendTestMail');

Route::get('thankyouMail', 'HomeController@thankyouMail');

// Route::post('serviceslist', ['as' => 'servicesList', 'uses' => 'HomeController@serviceList']);


