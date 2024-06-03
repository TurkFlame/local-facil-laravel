<?php

use App\Http\Controllers\AgiotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Middleware\EnsureSessionIsOpened;
use App\Providers\Provider;
use App\Http\Controllers\UserDividasController;

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

    Route::get('/debitos', function () {
        return view('pages.debitos');
    });

    
    Route::get('/trabalhe-conosco', function () {
        return view('pages.trabalheConosco');
    });

    Route::post('/dividas', [UserDividasController::class, 'criarDivida']);

    Route::get('/getAgiotas', [AgiotaController::class, 'getAgiotasReturnJson']);

});
