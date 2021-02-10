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

Route::get('/', 'PagesController@home');
// Sessions
Route::get('/login','SessionsController@new')->name('login');
Route::post('/login','SessionsController@create');
Route::get('/logout','SessionsController@destroy');

// Users
Route::get('/register','UsersController@new');
Route::get('/profile','UsersController@index');
Route::post('/register','UsersController@create');
Route::get('/users/edit/{userId}','UsersController@edit');

// Articles
Route::get('/users/{userId}/articles','UsersController@usersArticle');

Route::resource('articles','ArticlesController');
Route::get('/articles/category/{categoryName}','ArticlesController@categoriesArticles');

