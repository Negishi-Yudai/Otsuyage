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

Route::get('/', function () {
    return view('home/front-page');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
     Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
     Route::get('news','Admin\NewsController@index')->middleware('auth');
      Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記
    Route::get('naws/delete','Admin\NewsController@delete')->middleware('auth');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
     Route::post('profile/create', 'Admin\ProfileController@create'); # 追記
     Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
     Route::post('profile/edit','Admin\ProfileController@update')->middleware('auth');
});

Route::get('/profile', 'ProfileController@index');
//Route::get('/', 'NewsController@index');

Route::group(['prefix' => 'admin'], function() {
    Route::get('obento/create', 'Admin\ObentoController@create')->middleware('auth');
    Route::post('obento/store', 'Admin\ObentoController@store')->middleware('auth');
    
     Route::get('omiyage/create', 'Admin\OmiyageController@create')->middleware('auth');
    Route::post('omiyage/store', 'Admin\OmiyageController@store')->middleware('auth');
    
     Route::get('comment/create', 'Admin\CommentController@create')->middleware('auth');
     Route::post('comment/store', 'Admin\CommentController@store')->middleware('auth');
     
     Route::get('obento/edit', 'Admin\ObentoController@edit')->middleware('auth');
     Route::post('obento/update', 'Admin\ObentoController@update')->middleware('auth');
     
     Route::get('omiyage/edit', 'Admin\OmiyageController@edit')->middleware('auth');
     Route::post('omiyage/update', 'Admin\OmiyageController@update')->middleware('auth');
     
     Route::get('obento/delete', 'Admin\ObentoController@delete')->middleware('auth');
     Route::get('omiyage/delete', 'Admin\OmiyageController@delete')->middleware('auth');
});
