<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServisController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/servis', [ServisController::class, 'index'])->name('servis.index');
Route::get('/servis/create', [ServisController::class, 'create'])->name('servis.create');
Route::post('/servis', [ServisController::class, 'store'])->name('servis.store');
Route::get('/servis/{id}/edit', [ServisController::class, 'edit'])->name('servis.edit');
Route::put('/servis/{id}', [ServisController::class, 'update'])->name('servis.update');
Route::delete('/servis/{id}', [ServisController::class, 'destroy'])->name('servis.destroy');
Route::get('/servis/{id}/edit', [ServisController::class, 'edit'])->name('servis.edit');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
