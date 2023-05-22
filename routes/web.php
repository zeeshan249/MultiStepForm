<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'guest'], function () {
	Route::get('/', 'UserController@index')->name('index');
	Route::get('/signup', 'UserController@signup')->name('signup');
	Route::post('/confirmSignup', 'UserController@confirmSignup')->name('confirmSignup');
	Route::post('/confirmLogin', 'UserController@confirmLogin')->name('confirmLogin');
});

Route::group(['middleware' => 'auth'],function(){
	Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
	Route::post('/confirmstep1', 'UserController@confirmstep1')->name('confirmstep1');
	Route::get('stepTwo', 'UserController@step2')->name('step2');
    Route::post('confirmstep2', 'UserController@confirmstep2')->name('confirmstep2');
	Route::get('stepThree', 'UserController@step3')->name('step3');
	Route::get('final', 'UserController@downloadPDFPage')->name('downloadPDF');
	Route::get('confirmDownloadPDF', 'UserController@confirmDownloadPDF')->name('confirmDownloadPDF');
	Route::get('confirmIndividualDownloadPDF/{userId}', 'UserController@confirmIndividualDownloadPDF')->name('confirmIndividualDownloadPDF');
    Route::post('/confirmstep3', 'UserController@confirmstep3')->name('confirmstep3');
	Route::post('/logout', 'UserController@logout')->name('logout');
});

Route::group(['prefix'=>'admin'],function(){
	Route::get('/login', 'AdminController@index')->name('adminindex');
	Route::post('/confirmAdminLogin', 'AdminController@confirmAdminLogin')->name('confirmAdminLogin');
	
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
Route::get('/admin-dashboard', 'AdminController@admindashboard')->name('admindashboard');
	Route::post('/adminlogout', 'AdminController@adminlogout')->name('adminlogout');
});