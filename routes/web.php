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

Route::get('/', 'ArticleDirectoryController@index')->name('directory');;

Route::get('/search/{categoryTitle}', 'SearchController@category')->name('search-category');
Route::get('/search/{authorURL}', 'SearchController@author')->name('search-author');
Route::get('/article/{url}', 'ArticleController@index')->name('article');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/my/articles', 'DashboardController@userArticles')->name('user-articles');
Route::get('/dashboard/article/new', 'NewArticleController@index')->name('new-article');
Route::post('/dashboard/article/new', 'NewArticleController@create');
Route::post('/dashboard/category/new', 'CategoryController@create')->name('new-category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
