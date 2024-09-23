<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectGradeController;

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
    ->only(['index', 'store','edit','destroy', 'show', 'create', ''])
    ->middleware(['auth', 'verified']);
Route::get('careers/pickCareer/{student?}', [CareerController::class, 'pickCareer'])->name('careers.pickCareer'); 
Route::post('careers/setupCareer/{student?}', [CareerController::class, 'setupCareer'])->name('careers.setupCareer'); 

Route::resource('students', StudentController::class)
    ->only(['index', 'store','edit','destroy', 'update',  'show', 'create'])
    ->middleware(['auth', 'verified']);
Route::post('students/search}', [StudentController::class, 'search'])->name('students.search'); 

Route::resource('subjectGrades', SubjectGradeController::class)
    ->only(['index', 'store','edit','destroy', 'update',  'show', 'create'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
