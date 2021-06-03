<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')
    -> name('index');

Route::get('/pilot/{id}', 'MainController@show')
    -> name('show');

Route::get('/create/car', 'MainController@create')
    -> name('create');
Route::post('/store', 'MainController@store')
    -> name('store');