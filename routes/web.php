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

Route::get('/', 'ProjectController@index');
Route::post('projects/{id}', 'TaskController@store');
Route::resource('projects','ProjectController');
Route::delete('projects/{id}/task','TaskController@destroy');
//Route::resource('projects','TaskController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
