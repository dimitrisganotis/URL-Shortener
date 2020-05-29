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

Route::redirect('/', '/urls');

/*Route::resources([
    'urls' => 'UrlController',
]);*/

Route::get('/urls', 'UrlController@index');
Route::post('/urls', 'UrlController@store');
Route::get('/clicks/{url:tag}', 'UrlController@urlClicksCounter');
Route::get('/short-url/{url:tag}', 'UrlController@shortToFullUrlRedirection');

