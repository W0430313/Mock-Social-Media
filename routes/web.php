<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('main.home');
//});

Route::get('/home','App\Http\Controllers\HomeController@index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/users', 'App\Http\Controllers\UserController@index');
Route::get('/admin/users/create', 'App\Http\Controllers\UserController@create');
Route::post('/admin/users', 'App\Http\Controllers\UserController@store');
Route::get('/admin/users/delete/{user}', 'App\Http\Controllers\UserController@destroy');
Route::get('/admin/users/show/{user}', 'App\Http\Controllers\UserController@show');
Route::get('/admin/users/edit/{user}', 'App\Http\Controllers\UserController@edit');
Route::post('/admin/users/update', 'App\Http\Controllers\UserController@update');


Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/create', 'App\Http\Controllers\PostController@create');
Route::post('/','App\Http\Controllers\PostController@store');
Route::get('/edit/{post}', 'App\Http\Controllers\PostController@edit');
Route::post('/update','App\Http\Controllers\PostController@update');
Route::get('/delete/{post}','App\Http\Controllers\PostController@destroy');

Route::get('/admin/themes','App\Http\Controllers\ThemeController@index');
Route::post('/admin/themes','App\Http\Controllers\ThemeController@store');
Route::get('/admin/themes/create','App\Http\Controllers\ThemeController@create');
Route::get('/admin/themes/show/{theme}','App\Http\Controllers\ThemeController@show');
Route::get('/admin/themes/edit/{theme}','App\Http\Controllers\ThemeController@edit');
Route::post('/admin/themes/update','App\Http\Controllers\ThemeController@update');
Route::get('/admin/themes/delete/{theme}','App\Http\Controllers\ThemeController@destroy');
