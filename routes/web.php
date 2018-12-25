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
/*
Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('/', 'MainController@index');
Route::get('/old', 'MainController@old');
Route::get('/news', 'MainController@news');
Route::get('/care', 'MainController@care');
Route::get('/dogs', 'MainController@dogs');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/users', 'UserController@index');
/*ОСТАВЛЮ ДЛЯ ДОБАВЛЕНИЯ СОЗДАНИЯ, РЕДАКТИРОВАНИЯ И УДАЛЕНИЯ ПОЛЬЗОВАТЕЛЕЙ
 * Route::get("/users/{user}/edit", 'UserController@input');
 * Route::put("/users", 'UserController@save');
 * Route::get("/users/{user}/delete", 'UserController@destroy');
 */
