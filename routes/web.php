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
/* OLD ROUTS
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/users', 'UserController@index');
Route::get("/users/{user}/edit", "UserController@input");
Route::put("/users", "UserController@save");
Route::get("/users/{user}/delete", "UserController@destroy");

Route::get('/', 'MainController@index');
Route::get('/old', 'MainController@old'); //Неиспользую
Route::get('/news', 'DogController@news');
Route::get('/dogs1', 'DogController@index');
Route::get('/dogs', 'DogController@dogs');

