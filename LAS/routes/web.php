<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;

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
});

Route::resource('careers', CareerController::class)
    ->only(['index', 'store','edit','destroy', 'show', 'create'])
    ->middleware(['auth', 'verified']);

Route::resource('students', StudentController::class)
    ->only(['index', 'store','edit','destroy', 'show', 'create'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
