<?php

Route::get('/', 'MainController@index');

Route::get('/dogs1', 'DogController@index');
Route::get('/dogs', 'DogController@dogs');

Auth::routes();
Route::get("logout", "Auth\LoginController@logout");

//Route::get("/users", "UserController@index");
Route::get("/users/{user}/edit", "UserController@input");
//Route::put("/users", "UserController@save");
//Route::get("/users/{user}/delete", "UserController@destroy");

Route::get("/dog", "DogController@index");
Route::get("/dog/create", "DogController@input")
->name("dog.create");
Route::post("/dog", "DogController@save");
Route::get("/dog/{dogy}/edit", "DogController@input");
Route::put("/dog", "DogController@save");
Route::get("/dog/{id_dogs}", "DogController@view");
Route::get("/dog/{id_dogs}/{firstPhoto}", "DogController@view");

Route::get("/news/create", "NewsController@input")->name("news.create");
Route::get("/news", "NewsController@index");
Route::put("/news", "NewsController@save");
Route::post("/news", "NewsController@save");
Route::get("/news/{id}", "NewsController@view");
Route::get("/news/{id}/edit", "NewsController@input");

Route::get("/files", "FileController@index");
Route::post("/files", "FileController@create");
Route::get("/files/{file}", "FileController@get");
Route::get("/files/{file}/delete", "FileController@destroy");

Route::get("/content", "MainController@all");
Route::get("/contents/create", "MainController@input")->name("contents.create");
Route::match(["post", "put"], "/cont", "MainController@save");
Route::get("/cont/{content}/edit", "MainController@input");
Route::get("/cont/{content}/delete", "MainController@destroy");

Auth::routes();
