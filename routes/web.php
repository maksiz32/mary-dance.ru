<?php
Route::get('/', 'MainController@index');
Route::get('/litters', 'LitterController@index');
Route::get('/alldogs', 'DogController@alldogs');
Route::get("/login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("/login", "Auth\LoginController@login");
Route::get("logout", "Auth\LoginController@logout");
Route::get("/users", "UserController@index");
Route::get("/users/{user}/edit", "UserController@input");
Route::put("/users", "UserController@save");
Route::get("/users/{user}/delete", "UserController@destroy");

Route::get("/content", "MainController@all");
Route::get("/contents/create", "MainController@input")->name("contents.create");
Route::match(["post", "put"], "/cont", "MainController@save");
Route::get("/cont/{content}/edit", "MainController@input");
Route::get("/cont/{content}/delete", "MainController@destroy");
Route::get("/cont/{content}/part", "MainController@onepart");

Route::get("/litter/create", "LitterController@input")->name("litter.create");
Route::match(["post", "put"], "/litt", "LitterController@save");
Route::get("/litter/{id}/edit", "LitterController@input");
Route::get("/litter/{litt}/delete", "LitterController@destroy");
Route::get("/litter/{id}/view", "LitterController@vlitt");
Route::get("/litter/{id}/photo", "LitterController@photo");
Route::match(["post", "put"], "/litter", "LitterController@savePhoto");
Route::get("/litter/{id}/{photo}/delphoto", "LitterController@delphoto");

Route::get("/dog/{id_dogs}", "DogController@view");
Route::get("/dog/{id_dogs}/{firstPhoto}", "DogController@view");
//Route::get("/dog", "DogController@index");
Route::get("/dogs/create", "DogController@input")->name("dogs.create");
Route::match(["post", "put"], "/dog", "DogController@save");
Route::get("/dogs/{dogy}/edit", "DogController@input");
Route::get("/dogs/{dogy}/delete", "DogController@destroy");
Route::match(["post", "put"], "/dogs", "DogController@savePhoto");
Route::get("/dogs/{id}/{photo}/delphoto", "DogController@delphoto");

Route::get("/news/create", "NewsController@input")->name("news.create");
Route::get("/news", "NewsController@index");
Route::put("/news", "NewsController@save");
Route::post("/news", "NewsController@save");
Route::get("/news/{id}", "NewsController@view");
Route::get("/news/{id}/edit", "NewsController@input");
Route::get("/news/{nes}/delete", "NewsController@destroy");

Route::get("/adm", "MainController@main");
