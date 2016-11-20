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



Route::get('/', 'BlogController@visInnlegg');
Route::get('/blog/innlegg/{id}', 'BlogController@visInnlegget');

Route::get('/admin', 'AdminController@adminMeny');

Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@loginText');

Route::get('/admin/innlegg/{id}', 'AdminController@innlegg');
Route::get('/admin/innlegg', 'AdminController@innlegg');
Route::post('/admin/innlegg', 'AdminController@innleggText');

