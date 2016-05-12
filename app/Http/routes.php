<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');

Route::get('books', 'BooksController@index');

Route::match(['get','post'], 'books/{id}', 'BooksController@book')->name('viewbook');

Route::post('books', 'BooksController@review')->name('reviewbook');
