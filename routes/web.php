<?php

Route::get('/', function() {
    return view('commons.welcome');
});


Route::get('books', 'BookController@index');                // All books
Route::get('books/create', 'BookController@create');        // Get create book page/form
Route::get('books/search', 'BookController@search');
Route::post('books', 'BookController@store');               // Post request to create new book
Route::get('books/{id}', 'BookController@show');            // Single book
Route::get('books/{id}/edit', 'BookController@edit');       // Get edit book page/form
Route::post('books/{id}', 'BookController@update');          // Put request to edit a book

Route::get('authors', 'AuthorController@index');            // Get all authors
Route::get('authors/create', 'AuthorController@create');    // Get create author page/form
Route::post('authors', 'AuthorController@store');           // Post request to create new author
Route::get('authors/{id}', 'AuthorController@show');        // Get a single author
Route::get('authors/{id}/edit', 'AuthorController@edit');   // Get edit author page/form
Route::post('authors/{id}', 'AuthorController@update');      // Put request to edit a author

Route::get('copies', 'BookItemController@index');            // Get all copies
Route::get('copies/create', 'BookItemController@create');    // Get create author page/form
Route::get('copies/search', 'BookItemController@search');
Route::post('copies', 'BookItemController@store');           // Post request to create new author
Route::get('copies/{id}', 'BookItemController@show');        // Get a single author
Route::get('copies/{id}/edit', 'BookItemController@edit');   // Get edit author page/form
Route::post('copies/{id}', 'BookItemController@update');      // Put request to edit a author




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
