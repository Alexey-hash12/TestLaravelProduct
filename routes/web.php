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

Route::get('/', 'MainController@main')->name("main");

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post("check", "MainController@check")->name("check");
Route::get("/dictation/{res_id}/", "MainController@dictation")->name("dictation");
Route::get('/error/', 'MainController@error')->name("error");
Auth::routes();

// VK
Route::get('vk/auth', 'SocialController@index')->name('vk.auth');
Route::get('vk/auth/callback', 'SocialController@callback');

//Route::get('/home', 'HomeController@index')->name('home');
