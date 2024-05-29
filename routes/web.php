<?php

use App\Http\Controllers\Agiota;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;

Route::resource('agiota', Agiota::class);

Route::get('/', function () {
    return view('pages.login');
});

Route::post('/logar', [Login::class, 'validate_login']);

Route::get('/cadastro', function () {
    return view('pages.cadastro');
});

Route::post('/registrar', [Register::class, 'validate_register']);

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/favoritos', function () {
    return view('pages.favoritos');
});

Route::get('/simular', function () {
    return view('pages.simular');
});
