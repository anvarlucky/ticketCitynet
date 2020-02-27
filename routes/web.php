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

Route::get('/', 'HouseController@index');
Route::get('tasks/create','TaskController@create')->name('tasks.create');

Route::resource('/tasks','TaskController');

Route::resource('/organizations', 'OrganizationController');
Route::resource('/users', 'UserController');
Route::resource('/stat', 'StatController');
/*
Route::group(['middleware'=>'auth'], function() {
	Route::group(['middleware'=>'role:admin'], function() {
		Route::resource('profile', 'UserProfile');
	});
});

Route::group(['middleware'=>'role:client'], function(){

});
*/

//Route::get('tasks/{{$id}}','TaskController@edit');

Route::resource('/works','WorkController');
Route::resource('/departments','DepartmentController');
Route::resource('/comments', 'CommentController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
