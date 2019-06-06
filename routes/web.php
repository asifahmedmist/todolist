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

Route::get('/sortable', function () {
    return view('sortable');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/submitTask', 'HomeController@submitTask');
Route::get('/home/updateSortorder', 'HomeController@updateSortorder');
Route::get('/home/updateTaskStatus', 'HomeController@updateTaskStatus');