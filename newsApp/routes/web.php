<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastsController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\GenresController;


Route::get('/', [DashboardController::class, 'home'])->name('home');


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/welcome', [AuthController::class, 'welcome'])->name('welcome');


Route::get('/data-table', function () {
    return view('pages.data-table');
})->name('data-table');

Route::get('/table', function () {
    return view('pages.table');
})->name('table');


// CRUD CASTS

// buat data
Route::get('/casts/create', [CastsController::class, 'create']);
Route::post('/casts', [CastsController::class, 'store']);
// view data
Route::get('/casts', [CastsController::class, 'index'])->name("casts.index");
Route::get('/casts/{casts_id}', [CastsController::class, 'show'])->name('casts.detail');
// Update
Route::get('/casts/{id}/edit', [CastsController::class, 'edit'])->name('casts.edit');
Route::put('/casts/{id}', [CastsController::class, 'update'])->name('casts.update');
// Hapus
Route::delete('/casts/{id}/destroy', [CastsController::class, 'destroy'])->name('casts.destroy');


// CRUD GENRES

route::resource('genres', GenresController::class);

// CRUD FILMS

route::resource('films', FilmsController::class);

?>