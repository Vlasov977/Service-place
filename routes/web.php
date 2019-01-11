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

Route::get('/language/{locale}', function () {
    return redirect()->back();
});

Route::get('/', 'WelcomeController@index');
Route::get('/search', 'PostsController@search');

Route::get('/post/{id}', 'PostsController@post');
Route::get('/user/{id}', 'WelcomeController@user');
Route::get('/profile', 'WelcomeController@profile')->middleware('auth');
Route::get('/editProfile', 'WelcomeController@editProfile')->middleware('auth');
Route::post('/updateProfile',  'WelcomeController@updateProfile')->middleware('auth');

Route::get('/social', 'WelcomeController@social');
Route::post('/socialUpdate', 'WelcomeController@social_update');
Route::get('/social/{name}', 'WelcomeController@social_delete');

Route::get('/new-post', 'PostsController@new_post');
Route::get('/edit-post/{post}', 'PostsController@edit_post');
Route::get('/delete-post/{id}', 'PostsController@delete_post');
Route::post('/storePost', 'PostsController@storePost');
Route::post('/updatePost/{post}', 'PostsController@updatePost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
