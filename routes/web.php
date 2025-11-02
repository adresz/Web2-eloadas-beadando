<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VarosokController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
}) -> name('home');

Route::get('/adatbazis', [VarosokController::class, 'index'])->name('adatbazis');

Route::get('/kapcsolat', function () {
    return view('kapcsolat');
}) -> name('kapcsolat');

Route::get('form', function () { return view('form'); }); 
Route::post('form', 'App\Http\Controllers\ControllerForm@PrintFormContent');

Route::get('/uzenetek', function () {
    return view('uzenetek');
}) -> name('uzenetek') -> middleware('uzenetek');

Route::get('/diagram', function () {
    return view('diagram');
}) -> name('diagram');

Route::get('/crud', function () {
    return view('crud');
}) -> name('crud');

Route::get('/admin', function () {
    return view('admin');
})->name('admin') -> middleware('admin');


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});