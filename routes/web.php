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

Route::get('/add', 'App\Http\Controllers\ArticleController@add');
Route::get('/', 'App\Http\Controllers\ArticleController@show');
Route::post('/add_process', 'App\Http\Controllers\ArticleController@add_process');
Route::get('/detail/{id}', 'App\Http\Controllers\ArticleController@detail');
Route::get('/admin', 'App\Http\Controllers\ArticleController@show_by_admin');
Route::get('/edit/{id}', 'App\Http\Controllers\ArticleController@edit');
Route::post('/edit_process', 'App\Http\Controllers\ArticleController@edit_process');
Route::get('/delete/{id}', 'App\Http\Controllers\ArticleController@delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
