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

Route::get('/', 'homeController@getInfo');
Route::get('/home', 'homeController@getInfo');

Route::get('/contact', 'contactController@getAllContacts');

Route::get('/blog', 'blogController@getAllBlog');
Route::post('/ajax/blog', 'AjaxController@getAjaxBlog')->middleware('only.ajax');

/* Peticions AJAX
************************/
Route::post('/ajax/dades', 'AjaxController@getAjaxContact')->middleware('only.ajax');// Sólo llamadas de AJAX para HTML POST
Route::get('/ajax/dades', 'AjaxController@getAjaxContact');// Llamadas ajax tipo API GET - Exemple