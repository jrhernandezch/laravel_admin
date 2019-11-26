<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* HOME
************************/
Route::get('/', 'dashboardController@getInfo')->middleware('auth');
Route::get('/dashboard', 'dashboardController@getInfo')->middleware('auth');

Route::get('/general-info', 'generalController@getGeneralInfo')->middleware('auth');
Route::post('/ajax/general-info', 'AjaxTableController@getAjaxGeneralInfoTable')->middleware('only.ajax');
Route::post('/ajax/general-info/item', 'generalController@getAjaxGeneralInfoItem')->middleware('only.ajax');
Route::post('/ajax/general-info/update', 'generalController@getAjaxUpdateGeneralInfo')->middleware('only.ajax');

// Icons text
Route::post('/ajax/icons-info', 'AjaxTableController@getAjaxIconsInfoTable')->middleware('only.ajax');
Route::post('/ajax/icons-info/item', 'generalController@getAjaxInfoIconsItem')->middleware('only.ajax');
Route::post('/ajax/icons-info/update', 'generalController@getAjaxUpdateInfoIcons')->middleware('only.ajax');

// Social media
Route::post('/ajax/social-media', 'AjaxTableController@getAjaxSocialMediaInfoTable')->middleware('only.ajax');
Route::post('/ajax/social-media/item', 'generalController@getAjaxSocialMediaItem')->middleware('only.ajax');
Route::post('/ajax/social-media/update', 'generalController@getAjaxUpdateSocialMedia')->middleware('only.ajax');

// Services
Route::get('/services', 'servicesController@getServices')->middleware('auth');
Route::post('/ajax/services', 'AjaxTableController@getAjaxServicesTable')->middleware('only.ajax');
Route::post('/ajax/services/new', 'servicesController@getAjaxNewServices')->middleware('only.ajax');
Route::post('/ajax/services/item', 'servicesController@getAjaxServicesItem')->middleware('only.ajax');
Route::post('/ajax/services/update', 'servicesController@getAjaxUpdateServices')->middleware('only.ajax');
Route::post('/ajax/services/delete', 'servicesController@getAjaxDeleteServices')->middleware('only.ajax');

// Success case
Route::get('/success-cases', 'successCaseController@getSuccessCases')->middleware('auth');
Route::post('/ajax/success-cases', 'AjaxTableController@getAjaxSuccessCasesTable')->middleware('only.ajax');
Route::post('/ajax/success/new', 'successCaseController@getAjaxNewSuccessCases')->middleware('only.ajax');
Route::post('/ajax/success/item', 'successCaseController@getAjaxSuccessCasesItem')->middleware('only.ajax');
Route::post('/ajax/success/update', 'successCaseController@getAjaxUpdateSuccessCases')->middleware('only.ajax');
Route::post('/ajax/success/delete', 'successCaseController@getAjaxDeleteSuccessCases')->middleware('only.ajax');

// Slide
Route::post('/ajax/slide-info', 'AjaxTableController@getAjaxSlideInfoTable')->middleware('only.ajax');
Route::post('/ajax/slide/item', 'generalController@getAjaxSlideItem')->middleware('only.ajax');
Route::post('/ajax/slide/update', 'generalController@getAjaxUpdateSlide')->middleware('only.ajax');

/* ABOUT US
************************/
// Company
Route::get('/company', 'companyController@getCompany')->middleware('auth');
Route::post('/ajax/company-info', 'AjaxTableController@getAjaxCompanyTable')->middleware('only.ajax');
Route::post('/ajax/company/item', 'companyController@getAjaxCompanyItem')->middleware('only.ajax');
Route::post('/ajax/company/update', 'companyController@getAjaxUpdateCompany')->middleware('only.ajax');

// Team
Route::get('/team', 'teamController@getTeam')->middleware('auth');
Route::post('/ajax/team-info', 'AjaxTableController@getAjaxTeamTable')->middleware('only.ajax');
Route::post('/ajax/team/new', 'teamController@getAjaxNewTeam')->middleware('only.ajax');
Route::post('/ajax/team/item', 'teamController@getAjaxTeamItem')->middleware('only.ajax');
Route::post('/ajax/team/update', 'teamController@getAjaxUpdateTeam')->middleware('only.ajax');
Route::post('/ajax/team/delete', 'teamController@getAjaxDeleteTeam')->middleware('only.ajax');

// Clients
Route::get('/clients', 'clientsController@getClients')->middleware('auth');
Route::post('/ajax/clients-info', 'AjaxTableController@getAjaxClientsTable')->middleware('only.ajax');
Route::post('/ajax/clients/new', 'clientsController@getAjaxNewClients')->middleware('only.ajax');
Route::post('/ajax/clients/item', 'clientsController@getAjaxClientsItem')->middleware('only.ajax');
Route::post('/ajax/clients/update', 'clientsController@getAjaxUpdateClients')->middleware('only.ajax');
Route::post('/ajax/clients/delete', 'clientsController@getAjaxDeleteClients')->middleware('only.ajax');

/* CONTACT
************************/
Route::get('/contact', 'contactController@getAllContacts')->middleware('auth');
Route::post('/ajax/contact', 'AjaxTableController@getAjaxContactTable')->middleware('only.ajax');
Route::post('/ajax/contact/item', 'contactController@getAjaxContactItem')->middleware('only.ajax');
Route::post('/ajax/contact/delete', 'contactController@getAjaxDeleteContact')->middleware('only.ajax');

/* BLOG
************************/
Route::get('/blog', 'blogController@getAllBlog')->middleware('auth');
Route::post('/ajax/blog', 'AjaxTableController@getAjaxBlogTable')->middleware('only.ajax');
Route::post('/ajax/blog/new', 'blogController@getAjaxNewBlog')->middleware('only.ajax');
Route::post('/ajax/blog/item', 'blogController@getAjaxBlogItem')->middleware('only.ajax');
Route::post('/ajax/blog/update', 'blogController@getAjaxUpdateBlog')->middleware('only.ajax');
Route::post('/ajax/blog/delete', 'blogController@getAjaxDeleteBlog')->middleware('only.ajax');

/* AJAX
************************/
Route::get('/ajax/dades', 'AjaxTableController@getAjaxContact');// API GET


/* LOGIN - REGISTER
********************************** */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('logout');
