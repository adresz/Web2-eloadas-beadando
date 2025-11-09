<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VarosokController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LelekszamController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
}) -> name('home');

Route::get('/adatbazis', [VarosokController::class, 'index'])->name('adatbazis');

Route::get('/kapcsolat', function () {
    return view('kapcsolat');
}) -> name('kapcsolat');

Route::get('form', function () { return view('form'); }); 
Route::post('form', [UzenetController::class, 'store']);

Route::get('/uzenetek', [UzenetController::class, 'index'])
    ->name('uzenetek')
    ->middleware('uzenetek');
Route::post('/uzenetek', [UzenetController::class, 'store'])->name('uzenetek.store');

Route::get('/diagram', [ChartController::class, 'topvarosok'])->name('diagram');

Route::resource('lelekszam', LelekszamController::class);

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('admin.users.show');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});