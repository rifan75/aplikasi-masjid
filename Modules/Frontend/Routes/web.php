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
Route::get('/', 'HomeController@index')->name('home');

/**
 * Login Logout Routes
 */

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
/**
 * Register Routes
 */

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('/user/verify/{token}', 'VerifyController@verifyUser');
Route::get('/resend/link', 'HomeController@resendlink');

/*--Resume Route--*/
Route::get('/lecture', 'ResumeController@showlecture')->name('showlecture');
Route::get('/showshortresume/{id}', 'ResumeController@showshortresume')->name('showshortresume');
Route::get('/resume', 'ResumeController@index')->name('indexresume');
Route::get('/resume/{slug}', 'ResumeController@resume')->name('resume');

/*--Article Route--*/
Route::get('/article', 'ArticleController@index')->name('indexarticle');
Route::get('/article/{slug}', 'ArticleController@article')->name('article');
Route::get('/showshortarticle/{month}/{year}', 'ArticleController@showshortarticle')->name('showshortarticle');

/*--Mosque Route--*/
Route::get('/mosque', 'MosqueController@index')->name('mosque');
Route::get('/finance-report', 'MosqueController@lapkeu')->name('finance-report');
Route::get('/mustahiq-list', 'MosqueController@mustahiq')->name('mustahiq-list');
Route::get('/yatim-list', 'MosqueController@yatim')->name('yatim-list');

/*--Event Route--*/
Route::get('/event', 'EventController@index')->name('showevent');
Route::get('/event/{slug}', 'EventController@eventlain')->name('showeventlain');

/*--Development Route--*/
Route::get('/development', 'DevFrontController@index')->name('showdev');
Route::get('/development/{slug}/lapkeu', 'DevFrontController@lapkeu')->name('showdevlapkeu');
Route::get('/devprogress/{slug}/{date}', 'DevFrontController@progress')->name('showdevprogress');