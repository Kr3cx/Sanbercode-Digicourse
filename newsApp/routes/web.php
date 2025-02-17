<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;


Route::get('/', [DashboardController::class, 'home'])->name('home');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/welcome', [AuthController::class, 'welcome'])->name('welcome');


Route::get('/data-table', function () {
    return view('pages.data-table');
})->name('data-table');

Route::get('/table', function () {
    return view('pages.table');
})->name('table');

?>