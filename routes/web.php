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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Admin routes
Route::group(['middleware' => ['auth']], function() {
  Route::get('/admin/show-all/educational-resource', 'HomeController@index')->name('home');
  Route::get('/admin/create/educational-resource', 'EducationalResourcesController@create')->name('createResource');
  Route::post('/admin/store/educational-resource', 'EducationalResourcesController@store');
});
