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

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');
    /**
     * Mosque Routes
     */
    Route::get('/mosque', 'MosqueController@index')->name('mosque-admin');
    Route::patch('/mosque/{id}', 'MosqueController@update')->name('mosque-update');
    /**
     * User Routes
     */
    Route::get('/user', 'User\UserController@index')->name('user');
    Route::get('/user/{id}/edit', 'User\UserController@edit');
    Route::patch('/user/{id}', 'User\UserController@update');
    Route::delete('/user/{id}', 'User\UserController@delete');
    /**
     * Role Routes
     */
    Route::get('/role', 'User\RoleController@index')->name('role');
    Route::post('/role', 'User\RoleController@store');
    Route::get('/role/{id}/edit', 'User\RoleController@edit');
    Route::patch('/role/{id}', 'User\RoleController@update');
    /**
     * MyUser Routes
     */
    Route::patch('/myuser/{id}', 'User\MyUserController@update')->name('myuser-update');
    /**
     * Activate Routes
     */
    // Route::patch('/activateuser/{id}/{act}', 'User\ActivateController@updateuser');
    /**
     * Password Routes
     */
    Route::patch('/passwd/{id}', 'User\PasswordController@update')->name('password-update');

    /**
     * Category Routes
     */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category', 'CategoryController@store')->name('category-store');
    Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category-edit');
    Route::patch('/category/{id}', 'CategoryController@update')->name('category-update');
    Route::delete('/category/{id}', 'CategoryController@delete')->name('category-delete');

    /**
     * Scholar Routes
     */
    Route::get('/scholar', 'ScholarController@index')->name('scholar');
    Route::post('/scholar', 'ScholarController@store')->name('scholar-store');
    Route::get('/scholar/{id}/edit', 'ScholarController@edit')->name('scholar-edit');
    Route::patch('/scholar/{id}', 'ScholarController@update')->name('scholar-update');
    Route::delete('/scholar/{id}', 'ScholarController@delete')->name('scholar-delete');

    /**
     * Lecture Routes
     */
    Route::get('/lecture', 'Lecture\LectureController@index')->name('lecture');
    Route::post('/lecture', 'Lecture\LectureController@store')->name('lecture-store');
    Route::get('/lecture/{id}/edit', 'Lecture\LectureController@edit')->name('lecture-edit');
    Route::patch('/lecture/{id}', 'Lecture\LectureController@update')->name('lecture-update');
    Route::delete('/lecture/{id}', 'Lecture\LectureController@delete')->name('lecture-delete');

    /**
     * Event Routes
     */
    Route::get('/event', 'Event\EventController@index')->name('event');
    Route::post('/event', 'Event\EventController@store')->name('event-store');
    Route::get('/event/{id}/edit', 'Event\EventController@edit')->name('event-edit');
    Route::patch('/event/{id}', 'Event\EventController@update')->name('event-update');
    Route::delete('/event/{id}', 'Event\EventController@delete')->name('event-delete');

    /**
     * Finance Type Routes
     */
    Route::get('/type', 'Finance\TypeController@index')->name('type');
    Route::post('/type', 'Finance\TypeController@store')->name('type-store');
    Route::get('/type/{id}/edit', 'Finance\TypeController@edit')->name('type-edit');
    Route::patch('/type/{id}', 'Finance\TypeController@update')->name('type-update');
    Route::delete('/type/{id}', 'Finance\TypeController@delete')->name('type-delete');

    /**
     * Finance Donation Routes
     */
    Route::get('/donation', 'Finance\DonationController@index')->name('donation');
    Route::post('/donation', 'Finance\DonationController@store')->name('donation-store');
    Route::get('/donation/{id}/edit', 'Finance\DonationController@edit')->name('donation-edit');
    Route::patch('/donation/{id}', 'Finance\DonationController@update')->name('donation-update');
    Route::delete('/donation/{id}', 'Finance\DonationController@delete')->name('donation-delete');

    /**
     * Finance Cost Routes
     */
    Route::get('/cost', 'Finance\CostController@index')->name('cost');
    Route::post('/cost', 'Finance\CostController@store')->name('cost-store');
    Route::get('/cost/{id}/edit', 'Finance\CostController@edit')->name('cost-edit');
    Route::patch('/cost/{id}', 'Finance\CostController@update')->name('cost-update');
    Route::delete('/cost/{id}', 'Finance\CostController@delete')->name('cost-delete');

    /**
     * Mustahiq Routes
     */
    Route::get('/mustahiq', 'Mustahiq\MustahiqController@index')->name('mustahiq');
    Route::post('/mustahiq', 'Mustahiq\MustahiqController@store')->name('mustahiq-store');
    Route::get('/mustahiq/{id}/edit', 'Mustahiq\MustahiqController@edit')->name('mustahiq-edit');
    Route::patch('/mustahiq/{id}', 'Mustahiq\MustahiqController@update')->name('mustahiq-update');
    Route::delete('/mustahiq/{id}', 'Mustahiq\MustahiqController@delete')->name('mustahiq-delete');

    /**
     * Yatim Routes
     */
    Route::get('/yatim', 'Yatim\YatimController@index')->name('yatim');
    Route::post('/yatim', 'Yatim\YatimController@store')->name('yatim-store');
    Route::get('/yatim/{id}/edit', 'Yatim\YatimController@edit')->name('yatim-edit');
    Route::patch('/yatim/{id}', 'Yatim\YatimController@update')->name('yatim-update');
    Route::delete('/yatim/{id}', 'Yatim\YatimController@delete')->name('yatim-delete');

     /**
     * Resume Routes
     */
    Route::get('/resume', 'Lecture\ResumeController@index')->name('resume-admin');
    Route::get('/resume-create', 'Lecture\ResumeController@create')->name('resume-create');
    Route::post('/resume', 'Lecture\ResumeController@store')->name('resume-store');
    Route::get('/resume/{id}/edit', 'Lecture\ResumeController@edit')->name('resume-edit');
    Route::patch('/resume/{id}', 'Lecture\ResumeController@update')->name('resume-update');
    Route::delete('/resume/{id}', 'Lecture\ResumeController@delete')->name('resume-delete');

    /**
     * Article Routes
     */
    Route::get('/article', 'ArticleController@index')->name('article-admin');
    Route::get('/article-create', 'ArticleController@create')->name('article-create');
    Route::post('/article', 'ArticleController@store')->name('article-store');
    Route::get('/article/{id}/edit', 'ArticleController@edit')->name('article-edit');
    Route::patch('/article/{id}', 'ArticleController@update')->name('article-update');
    Route::delete('/article/{id}', 'ArticleController@delete')->name('article-delete');

});

