<?php

use App\Http\Controllers\Agiota;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;

Route::resource('agiota', Agiota::class);

Route::get('/', function () {
    return view('pages.welcome');
});

Route::post('/logar', [Login::class, 'validate_login']);

Route::get('/register', function () {
    return view('pages.register');
});

Route::post('/registrar', [Register::class, 'validate_register']);

Route::get('/home', function () {
    return view('pages.home');
});


Route::post('/signin', function () {    
});