<?php

use App\Http\Controllers\Agiota;
use Illuminate\Support\Facades\Route;

Route::resource('agiota', Agiota::class);

Route::get('/', function () {
    return view('pages.welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::post('/login', function () {
});

Route::post('/signin', function () {    
});