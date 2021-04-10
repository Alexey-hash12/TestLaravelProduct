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


// Email
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// Main 
Route::get('/', 'MainController@main')->name("main");
Route::post("check", "MainController@check")->name("check");
Route::get("/dictation/{res_id}/", "MainController@dictation")->name("dictation");
Route::get('/error/', 'MainController@error')->name("error");
Auth::routes();


// VK
Route::get('vk/auth', 'SocialController@index')->name('vk.auth');
Route::get('vk/auth/callback', 'SocialController@callback');


// Admin
Route::group(['middleware' => ['role:admin']], function() {
	Route::get("admin/", "AdminController@home")->name("admin_home");
	Route::get("admin/users", "AdminController@users")->name("admin_users");
	Route::get("admin/dictation","AdminController@dictation")->name("admin_dictation");
	Route::get("admin/dictation_result","AdminController@dictation_result")->name("admin_dictation_result");
	Route::post("admin/update_dictation", "AdminController@update_dictation")->name("admin_update_dictation");
	Route::post("admin/create_dictation", "AdminController@create_dictation")->name("admin_create_dictation");
	Route::post("admin/users_delete", "AdminController@users_delete")->name('admin_users_delete');
	Route::post('admin/dictation_result_delete', "AdminController@dictation_result_delete")->name("admin_dictation_result_delete");
});

// wihout email verification
//Route::get('/home', 'HomeController@index')->name('home');