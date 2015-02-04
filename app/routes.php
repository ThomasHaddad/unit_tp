<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses'=>'HomeController@index'));


Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));


//Route::get('create',array('before'=>'auth','uses'=>'AperoController@index'));
Route::get('create', ['before'=>'auth', 'as'=>'create', 'uses'=>'AperoController@index']);
Route::post('postCreate',array('before'=>'auth','uses'=>'AperoController@postCreate'));

//Route::get('test', function(){
//
//    dd(Apero::find(1)->tag());
//
//});
