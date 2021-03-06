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
	return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('visimisi', function () {
		return view('admin.content.VisiMisi.visimisi');
	})->name('visimisi');	
	Route::get('aboutme', function () {
		return view('admin.content.About.aboutme');
	})->name('aboutme');
	Route::get('gallery', function () {
		return view('admin.content.Gallery.gallery');
	})->name('gallery');
	Route::get('news', function () {
		return view('admin.content.News.news');
	})->name('news');
	Route::get('contactus', function () {
		return view('admin.content.ContactUs.contactus');
	})->name('contactus');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

