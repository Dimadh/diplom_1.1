<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', ['uses' => 'HomeController@index' , 'as' =>'home']);
Route::post('/', 'HomeController@storer')->name('programmer');
Route::post('/', 'HomeController@storers')->name('task');
Route::get('/autorisation', ['uses' => 'HomeController@autorisation' , 'as' =>'home1']);
Route::get('/registration', ['uses' => 'HomeController@registration' , 'as' => 'home2']);
Route::post('/registration', 'HomeController@store')->name('customer');
Route::get('/task', ['uses' => 'HomeController@mainform' , 'as' => 'home3']);
Route::post('/take_prog', ['uses' => 'HomeController@search' , 'as' => 'issue']);
Route::post('/send_task', ['uses' => 'HomeController@send' , 'as' => 'issue1']);
Route::post('/update_task', ['uses' => 'HomeController@updatetask' , 'as' => 'issue2']);
Route::post('/create_task', ['uses' => 'HomeController@createAndsend' , 'as' => 'issue3']);