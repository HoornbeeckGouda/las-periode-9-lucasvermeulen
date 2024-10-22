<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerSubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectGradeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureStudentOwnsProfile;
use App\Models\CareerSubject;

Route::group(['middleware' => ['role:admin']], function(){  
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/delete/{permissionsId?}', [PermissionController::class, 'delete'])->name('permissions.delete'); 
    
    Route::resource('roles', RoleController::class);
    Route::get('roles/delete/{roleId?}', [RoleController::class, 'destroy'])->name('roles.delete');
    // ->middleware('permission:delete role'); 

    Route::get('roles/add-permissions/{roleId?}', [RoleController::class, 'addPermissionToRole'])->name('roles.add-permissions'); 
    Route::put('roles/add-permissions/{roleId?}', [RoleController::class, 'givePermissionToRole'])->name('roles.add-permissions');
    
    Route::resource('users', UserController::class);
    Route::get('users/delete/{userId?}', [UserController::class, 'destroy'])->name('users.delete'); 
    
});


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


Route::group(['middleware' => ['role:docent|admin|lob|administation|student']], function(){  
    Route::resource('students', StudentController::class)
        ->only(['index', 'store', 'edit', 'destroy', 'update', 'show', 'create'])
        ->middleware(['auth', 'verified']);
});


Route::resource('careerSubject', CareerSubjectController::class)
    ->only(['index', 'store', 'edit', 'destroy', 'update', 'show', 'create'])
    ->middleware(['auth', 'verified']);
Route::get('careerSubject/studentAddSubject/{student}', [CareerSubjectController::class, 'studentAddSubject'])->name('career-subject.studentAddSubject'); 
Route::get('careerSubject/groupAddSubject/{group}', [CareerSubjectController::class, 'groupAddSubject'])->name('career-subject.groupAddSubject'); 
Route::post('careerSubject/groupStore', [CareerSubjectController::class, 'groupStore'])->name('career-subject.groupStore'); 

Route::post('students/search', [StudentController::class, 'search'])->name('students.search'); 
Route::get('/student-career/{careerId}', [StudentController::class, 'getCareerData']);

Route::resource('subjectGrades', SubjectGradeController::class)
    ->only(['index', 'store','edit','destroy', 'update',  'show', 'create'])
    ->middleware(['auth', 'verified']);
Route::post('subjectGrades/enterBulk', [SubjectGradeController::class, 'enterBulk'])->name('subjectGrades.enterBulk'); 
Route::post('subjectGrades/search', [SubjectGradeController::class, 'search'])->name('subjectGrades.search'); 
Route::get('/subject-grades/groupGrade/{group}', [SubjectGradeController::class, 'groupGrade'])->name('subjectGrades.groupGrade');
Route::post('/subject-grades/groupStore', [SubjectGradeController::class, 'groupStore'])->name('subjectGrades.groupStore');
Route::get('/subject-grades/pickSubject/{student}', [SubjectGradeController::class, 'pickSubject'])->name('subjectGrades.pickSubject');
Route::get('/subject-grades/studentGrade/{student_id}/{subject_id?}', [SubjectGradeController::class, 'studentGrade'])->name('subjectGrades.studentGrade');


require __DIR__.'/auth.php';
