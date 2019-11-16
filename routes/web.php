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

/* HOME
************************/
Route::get('/', 'homeController@getInfo');
Route::get('/home', 'homeController@getInfo');
Route::get('/success-cases', 'homeController@getSuccessCases');
Route::get('/general-info', 'homeController@getGeneralInfo');
Route::get('/services', 'homeController@getServices');

Route::post('/ajax/general-info', 'AjaxController@getAjaxGeneralInfo')->middleware('only.ajax');
Route::post('/ajax/icons-info', 'AjaxController@getAjaxIconsInfo')->middleware('only.ajax');
Route::post('/ajax/social-media', 'AjaxController@getAjaxSocialMediaInfo')->middleware('only.ajax');
Route::post('/ajax/services', 'AjaxController@getAjaxServices')->middleware('only.ajax');
Route::post('/ajax/success-cases', 'AjaxController@getAjaxSuccessCase')->middleware('only.ajax');
Route::post('/ajax/slide-info', 'AjaxController@getAjaxSlideInfo')->middleware('only.ajax');

/* ABOUT US
************************/
Route::get('/company', 'aboutController@getCompany');
Route::get('/team', 'aboutController@getTeam');
Route::get('/clients', 'aboutController@getClients');

Route::post('/ajax/company-info', 'AjaxController@getAjaxCompany')->middleware('only.ajax');
Route::post('/ajax/team-info', 'AjaxController@getAjaxTeam')->middleware('only.ajax');
Route::post('/ajax/clients-info', 'AjaxController@getAjaxClients')->middleware('only.ajax');

/* CONTACT
************************/
Route::get('/contact', 'contactController@getAllContacts');
Route::post('/ajax/dades', 'AjaxController@getAjaxContact')->middleware('only.ajax');

/* BLOG
************************/
Route::get('/blog', 'blogController@getAllBlog');
Route::post('/ajax/blog', 'AjaxController@getAjaxBlog')->middleware('only.ajax');

/* AJAX
************************/
Route::get('/ajax/dades', 'AjaxController@getAjaxContact');// API GET