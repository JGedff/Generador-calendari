<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurController;
use App\Http\Controllers\CalendariController;
use App\Http\Controllers\FestiuController;
use App\Http\Controllers\TrimestreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/calendari/export', [CalendariController::class, 'exportCalendari']);
});

Route::middleware('auth', 'admin')->group(function () {
    Route::resource('cur', CurController::class);
    Route::resource('cur.festiu', FestiuController::class);
    Route::resource('cur.trimestre', TrimestreController::class);
    Route::resource('calendari', CalendariController::class);
});

Route::get('/notAdmin', function () {
    return view('no_admin');
});

require __DIR__.'/auth.php';
