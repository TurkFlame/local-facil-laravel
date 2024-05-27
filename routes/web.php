<?php

use App\Http\Controllers\Agiota;
use Illuminate\Support\Facades\Route;

Route::resource('agiota', Agiota::class);

Route::get('/', function () {
    return view('pages.welcome');
});


Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::post('/login', function () {
});

Route::post('/signin', function () {    
});