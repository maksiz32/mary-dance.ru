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

Route::get('/', 'MainController@index');
Route::get('/policy', 'MainController@policy');
Route::get('/about', 'MainController@about');
Route::get('/bbcodes', 'MainController@bbcodes');

Route::get('/news', 'NewsController@index');
Route::get('/dogs1', 'DogController@index');
Route::get('/dogs', 'DogController@dogs');

Auth::routes();
Route::get("logout", "Auth\LoginController@logout");

Route::get("/users", "UserController@index");
Route::get("/users/{user}/edit", "UserController@input");
Route::put("/users", "UserController@save");
Route::get("/users/{user}/delete", "UserController@destroy");

Route::get("/dog", "DogController@index");
Route::get("/dog/create", "DogController@input")
->name("dog.create");
Route::post("/dog", "DogController@save");
Route::get("/dog/{dogy}/edit", "DogController@input");
Route::put("/dog", "DogController@save");
Route::get("/dog/{id_dogs}", "DogController@view");
Route::get("/dog/{id_dogs}/{firstPhoto}", "DogController@view");

Route::get("/news/create", "NewsController@input")
->name("news.create");

Route::get("/subcategories", "SubcategoryController@index");
Route::get("/subcategories/create", "SubcategoryController@input")
->name("subcategories.create");
Route::post("/subcategories", "SubcategoryController@save");
Route::get("/subcategories/{subcategory}/edit", "SubcategoryController@input");
Route::put("/subcategories", "SubcategoryController@save");
Route::get("/subcategories/{subcategory}/delete", "SubcategoryController@destroy");

Route::get("/view/{category}/{subcategory}", "ArticleController@index");
Route::get("/view/{category}/{subcategory}/{article}", "ArticleController@view");
Route::get("/search", "ArticleController@search");

Route::get("/articles/{category}/{subcategory}/create", "ArticleController@input")
->name("articles.create");
Route::post("/articles/{category}/{subcategory}", "ArticleController@save");
Route::get("/articles/{category}/{subcategory}/{article}/edit",
"ArticleController@input");
Route::put("/articles/{category}/{subcategory}", "ArticleController@save");
Route::get("/articles/{category}/{subcategory}/{article}/delete",
"ArticleController@destroy");

Route::get("/comments", "CommentController@index");
Route::get("/comments/create", "CommentController@input");
Route::post("/comments", "CommentController@create");
Route::get("/comments/{comment}/edit", "CommentController@input");
Route::put("/comments", "CommentController@save");
Route::get("/comments/{comment}/delete", "CommentController@destroy");

Route::get("/files", "FileController@index");
Route::post("/files", "FileController@create");
Route::get("/files/{file}", "FileController@get");
Route::get("/files/{file}/delete", "FileController@destroy");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
DB::listen(function($query) {
    dd($query->sql, $query->bindings);
});
 * 
 */