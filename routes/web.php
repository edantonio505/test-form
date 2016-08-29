<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@index');

Auth::routes();

/*-------------------------------------------------------------------
						POST DATA FROM FORM
--------------------------------------------------------------------*/
Route::post('/post_form_data', ['as' => 'postSaveInfo', 'uses' => 'FormController@postFormData']);


/*-------------------------------------------------------------------
							ADMIN DASHBOARD
--------------------------------------------------------------------*/
Route::get('/admin_dashboard', 'AdminController@Dashboard');
Route::get('/review_form/{id}', 'FormController@getReviewForm');
Route::get('/change_status/{id}/{status}', 'FormController@postReviewForm');