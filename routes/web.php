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
Route::post('/ajax/company/item', 'aboutController@getAjaxCompanyItem')->middleware('only.ajax');
Route::post('/ajax/company/update', 'aboutController@getAjaxUpdateCompany')->middleware('only.ajax');

Route::post('/ajax/team-info', 'AjaxController@getAjaxTeam')->middleware('only.ajax');
Route::post('/ajax/team/new', 'aboutController@getAjaxNewTeam')->middleware('only.ajax');
Route::post('/ajax/team/item', 'aboutController@getAjaxTeamItem')->middleware('only.ajax');
Route::post('/ajax/team/update', 'aboutController@getAjaxUpdateTeam')->middleware('only.ajax');
Route::post('/ajax/team/delete', 'aboutController@getAjaxDeleteTeam')->middleware('only.ajax');

Route::post('/ajax/clients-info', 'AjaxController@getAjaxClients')->middleware('only.ajax');
Route::post('/ajax/clients/new', 'aboutController@getAjaxNewClients')->middleware('only.ajax');
Route::post('/ajax/clients/item', 'aboutController@getAjaxClientsItem')->middleware('only.ajax');
Route::post('/ajax/clients/update', 'aboutController@getAjaxUpdateClients')->middleware('only.ajax');
Route::post('/ajax/clients/delete', 'aboutController@getAjaxDeleteClients')->middleware('only.ajax');

/* CONTACT
************************/
Route::get('/contact', 'contactController@getAllContacts');

Route::post('/ajax/contact', 'AjaxController@getAjaxContact')->middleware('only.ajax');
Route::post('/ajax/contact/item', 'contactController@getAjaxContactItem')->middleware('only.ajax');
Route::post('/ajax/contact/delete', 'contactController@getAjaxDeleteContact')->middleware('only.ajax');

/* BLOG
************************/
Route::get('/blog', 'blogController@getAllBlog');

Route::post('/ajax/blog', 'AjaxController@getAjaxBlog')->middleware('only.ajax');
Route::post('/ajax/blog/new', 'blogController@getAjaxNewBlog')->middleware('only.ajax');
Route::post('/ajax/blog/item', 'blogController@getAjaxBlogItem')->middleware('only.ajax');
Route::post('/ajax/blog/update', 'blogController@getAjaxUpdateBlog')->middleware('only.ajax');
Route::post('/ajax/blog/delete', 'blogController@getAjaxDeleteBlog')->middleware('only.ajax');

/* AJAX
************************/
Route::get('/ajax/dades', 'AjaxController@getAjaxContact');// API GET