<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Middleware\EnsureSessionIsOpened;
use App\Providers\Provider;

Route::post('/login', [Login::class, 'index']);
Route::get('/login', function () {
    session()->forget('name');
    session()->forget('email');
    return view('pages.login');
})->name('login');

Route::post('/register', [Register::class, 'index']);
Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([EnsureSessionIsOpened::class])->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/favoritos', function () {
        return view('pages.favoritos');
    });

    Route::get('/simular', function () {
        return view('pages.simular');
    });
});

Route::post('/login_temporary', [Provider::class, 'login']);

