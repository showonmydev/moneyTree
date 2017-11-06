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


Route::get('/lifecard','LifeCardController@show')->middleware('auth');
Route::post('/lifecard','LifeCardController@selection')->middleware('auth');
Route::get('/manageLifecard','LifeCardController@AdminShow')->middleware('auth:admin');
Route::post('/SaveLifeCard','LifeCardController@store')->middleware('auth:admin');
Route::post('/UpdateLifeCard/{card}','LifeCardController@update')->middleware('auth:admin');
Route::post('/DeleteLifeCard/{card}','LifeCardController@delete')->middleware('auth:admin');

Route::get('/category/{cat}/treevia','TrivaController@show')->middleware('auth');
Route::post('/triva/{triva}','TrivaController@select')->middleware('auth');
Route::get('/manageTreeVia','TrivaController@AdminShow')->middleware('auth:admin');
Route::post('/SaveTreeVia','TrivaController@store')->middleware('auth:admin');
Route::post('/UpdateTreeVia/{TreeVia}','TrivaController@update')->middleware('auth:admin');
Route::post('/DeleteTreeVia/{TreeVia}','TrivaController@delete')->middleware('auth:admin');



Route::get('/manageTreeViaCategory','CategoryController@AdminShow')->middleware('auth:admin');
Route::post('/SaveTreeViaCategory','CategoryController@store')->middleware('auth:admin');
Route::post('/UpdateTreeViaCategory/{Category}','CategoryController@update')->middleware('auth:admin');
Route::post('/DeleteTreeViaCategory/{Category}','CategoryController@delete')->middleware('auth:admin');
Route::post('/Categories','CategoryController@show')->middleware('auth');

Route::post('/Food','FoodController@show')->middleware('auth');
Route::post('/storeRange','FoodController@show')->middleware('auth:admin');


Route::get('/Jobs','JobsController@show')->middleware('auth');
Route::get('/manageJobs','JobsController@adminShow')->middleware('auth:admin');
Route::post('/SaveJobs','JobsController@store')->middleware('auth:admin');
Route::post('/UpdateJobs/{jobs}','JobsController@update')->middleware('auth:admin');
Route::post('/DeleteJobs/{jobs}','JobsController@delete')->middleware('auth:admin');


Route::get('/manageAccount','AccountsController@AdminShow')->middleware('auth:admin');
Route::post('/SaveUser','AccountsController@store')->middleware('auth:admin');
Route::post('/UpdateUser/{User}','AccountsController@update')->middleware('auth:admin');
Route::post('/DeleteUser/{User}','AccountsController@delete')->middleware('auth:admin');

Auth::routes();



Route::get('/', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
