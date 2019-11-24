<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* HOME
************************/
Route::get('/', 'dashboardController@getInfo');
Route::get('/home', 'dashboardController@getInfo');

Route::get('/general-info', 'homeController@getGeneralInfo');
Route::post('/ajax/general-info', 'AjaxTableController@getAjaxGeneralInfoTable')->middleware('only.ajax');
Route::post('/ajax/general-info/item', 'homeController@getAjaxGeneralInfoItem')->middleware('only.ajax');
Route::post('/ajax/general-info/update', 'homeController@getAjaxUpdateGeneralInfo')->middleware('only.ajax');

// Icons text
Route::post('/ajax/icons-info', 'AjaxTableController@getAjaxIconsInfoTable')->middleware('only.ajax');
Route::post('/ajax/icons-info/item', 'homeController@getAjaxInfoIconsItem')->middleware('only.ajax');
Route::post('/ajax/icons-info/update', 'homeController@getAjaxUpdateInfoIcons')->middleware('only.ajax');

// Social media
Route::post('/ajax/social-media', 'AjaxTableController@getAjaxSocialMediaInfoTable')->middleware('only.ajax');
Route::post('/ajax/social-media/item', 'homeController@getAjaxSocialMediaItem')->middleware('only.ajax');
Route::post('/ajax/social-media/update', 'homeController@getAjaxUpdateSocialMedia')->middleware('only.ajax');

// Services
Route::get('/services', 'servicesController@getServices');
Route::post('/ajax/services', 'AjaxTableController@getAjaxServicesTable')->middleware('only.ajax');
Route::post('/ajax/services/new', 'servicesController@getAjaxNewServices')->middleware('only.ajax');
Route::post('/ajax/services/item', 'servicesController@getAjaxServicesItem')->middleware('only.ajax');
Route::post('/ajax/services/update', 'servicesController@getAjaxUpdateServices')->middleware('only.ajax');
Route::post('/ajax/services/delete', 'servicesController@getAjaxDeleteServices')->middleware('only.ajax');

// Success case
Route::get('/success-cases', 'successCaseController@getSuccessCases');
Route::post('/ajax/success-cases', 'AjaxTableController@getAjaxSuccessCasesTable')->middleware('only.ajax');
Route::post('/ajax/success/new', 'successCaseController@getAjaxNewSuccessCases')->middleware('only.ajax');
Route::post('/ajax/success/item', 'successCaseController@getAjaxSuccessCasesItem')->middleware('only.ajax');
Route::post('/ajax/success/update', 'successCaseController@getAjaxUpdateSuccessCases')->middleware('only.ajax');
Route::post('/ajax/success/delete', 'successCaseController@getAjaxDeleteSuccessCases')->middleware('only.ajax');

// Slide
Route::post('/ajax/slide-info', 'AjaxTableController@getAjaxSlideInfoTable')->middleware('only.ajax');
Route::post('/ajax/slide/item', 'homeController@getAjaxSlideItem')->middleware('only.ajax');
Route::post('/ajax/slide/update', 'homeController@getAjaxUpdateSlide')->middleware('only.ajax');

/* ABOUT US
************************/
// Company
Route::get('/company', 'companyController@getCompany');
Route::post('/ajax/company-info', 'AjaxTableController@getAjaxCompanyTable')->middleware('only.ajax');
Route::post('/ajax/company/item', 'companyController@getAjaxCompanyItem')->middleware('only.ajax');
Route::post('/ajax/company/update', 'companyController@getAjaxUpdateCompany')->middleware('only.ajax');

// Team
Route::get('/team', 'teamController@getTeam');
Route::post('/ajax/team-info', 'AjaxTableController@getAjaxTeamTable')->middleware('only.ajax');
Route::post('/ajax/team/new', 'teamController@getAjaxNewTeam')->middleware('only.ajax');
Route::post('/ajax/team/item', 'teamController@getAjaxTeamItem')->middleware('only.ajax');
Route::post('/ajax/team/update', 'teamController@getAjaxUpdateTeam')->middleware('only.ajax');
Route::post('/ajax/team/delete', 'teamController@getAjaxDeleteTeam')->middleware('only.ajax');

// Clients
Route::get('/clients', 'clientsController@getClients');
Route::post('/ajax/clients-info', 'AjaxTableController@getAjaxClientsTable')->middleware('only.ajax');
Route::post('/ajax/clients/new', 'clientsController@getAjaxNewClients')->middleware('only.ajax');
Route::post('/ajax/clients/item', 'clientsController@getAjaxClientsItem')->middleware('only.ajax');
Route::post('/ajax/clients/update', 'clientsController@getAjaxUpdateClients')->middleware('only.ajax');
Route::post('/ajax/clients/delete', 'clientsController@getAjaxDeleteClients')->middleware('only.ajax');

/* CONTACT
************************/
Route::get('/contact', 'contactController@getAllContacts');
Route::post('/ajax/contact', 'AjaxTableController@getAjaxContactTable')->middleware('only.ajax');
Route::post('/ajax/contact/item', 'contactController@getAjaxContactItem')->middleware('only.ajax');
Route::post('/ajax/contact/delete', 'contactController@getAjaxDeleteContact')->middleware('only.ajax');

/* BLOG
************************/
Route::get('/blog', 'blogController@getAllBlog');
Route::post('/ajax/blog', 'AjaxTableController@getAjaxBlogTable')->middleware('only.ajax');
Route::post('/ajax/blog/new', 'blogController@getAjaxNewBlog')->middleware('only.ajax');
Route::post('/ajax/blog/item', 'blogController@getAjaxBlogItem')->middleware('only.ajax');
Route::post('/ajax/blog/update', 'blogController@getAjaxUpdateBlog')->middleware('only.ajax');
Route::post('/ajax/blog/delete', 'blogController@getAjaxDeleteBlog')->middleware('only.ajax');

/* AJAX
************************/
Route::get('/ajax/dades', 'AjaxTableController@getAjaxContact');// API GET