<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VarosokController;

Route::get('/', function () {
    return view('home');
}) -> name('home');

Route::get('/adatbazis', [VarosokController::class, 'index'])->name('adatbazis');

Route::get('/kapcsolat', function () {
    return view('kapcsolat');
}) -> name('kapcsolat');

Route::get('/uzenetek', function () {
    return view('uzenetek');
}) -> name('uzenetek');

Route::get('/diagram', function () {
    return view('diagram');
}) -> name('diagram');

Route::get('/crud', function () {
    return view('crud');
}) -> name('crud');

Route::get('/admin', function () {
    return view('admin');
}) -> name('admin');
