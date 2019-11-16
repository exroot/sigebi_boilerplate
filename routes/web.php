<?php

Route::get('/', function() {
    return view('commons.welcome');
});
Route::get('book', 'BookController@index');
Route::get('book/{id}', 'BookController@show');
Route::get('author', 'AuthorController@index');
Route::get('author/{id}', 'AuthorController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
