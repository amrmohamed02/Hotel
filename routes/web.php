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


Route::get('/save','savedatacontroller@saveApiData');

Route::get('/search','searchcontroller@search');
Route::post('/search','searchcontroller@search');

Route::get('/sort','searchcontroller@sort');
Route::post('/sort','searchcontroller@sort');

Route::get('/show','searchcontroller@show');
Route::post('/show','searchcontroller@show');