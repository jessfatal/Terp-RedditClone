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

Route::get('/', 'PostsController@index');

Auth::routes();

Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::get('/post/{id}', 'PostsController@view')->name('post.view');
Route::post('/post', 'PostsController@store')->name('post.store');

Route::post('/post/{user}/{vote}/{post_id}', 'User@vote')->name('post.vote');

Route::get('/p/{username}', 'ProfilesController@index')->name('profile.show');
Route::get('/p/{username}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/p/{username}', 'ProfilesController@update')->name('profile.update');
