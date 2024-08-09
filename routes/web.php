<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', Controllers\HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('dashboard', Controllers\DashboardController::class)->name('dashboard');
    });

    Route::middleware('teacher')->group(function () {
//
    });


    Route::resource('teachers', Controllers\TeacherController::class);
    Route::resource('students', Controllers\StudentController::class);
    Route::resource('classrooms', Controllers\ClassroomController::class);
    Route::resource('mapels', Controllers\MapelController::class);

    Route::get('lessons', [Controllers\LessonController::class, 'index'])->name('lessons.index');
    Route::get('lessons/classroom/{classroom}', [Controllers\LessonController::class, 'show'])->name('lessons.show');
    Route::post('lessons/{classroom}/{mapel}', [Controllers\LessonController::class, 'attach_mapel'])->name('attach_mapel');
    Route::delete('lessons/{classroom}/{mapel}', [Controllers\LessonController::class, 'detach_mapel'])->name('detach_mapel');
    Route::patch('lessons/{classroom}/{mapel}', [Controllers\LessonController::class, 'attach_teacher'])->name('attach_teacher');
    Route::delete('lessons/{classroom}/{mapel}/{teacher}', [Controllers\LessonController::class, 'detach_teacher'])->name('detach_teacher');

    Route::get('classmembers', [Controllers\ClassmemberController::class, 'index'])->name('classmembers.index');
    Route::get('classmembers/classroom/{classroom}', [Controllers\ClassmemberController::class, 'show'])->name('classmembers.show');
    Route::post('classmembers/{classroom}/{student}', [Controllers\ClassmemberController::class, 'attach_classmember'])->name('attach_classmember');
    Route::delete('classmembers/{classroom}/{student}', [Controllers\ClassmemberController::class, 'detach_classmember'])->name('detach_classmember');

    Route::get('exculmembers', [Controllers\ExculmemberController::class, 'index'])->name('exculmembers.index');
    Route::get('exculmembers/excul/{excul}', [Controllers\ExculmemberController::class, 'show'])->name('exculmembers.show');
    Route::post('exculmembers/{excul}/{classmember}', [Controllers\ExculmemberController::class, 'attach_excul_member'])->name('attach_excul_member');
    Route::delete('exculmembers/{excul}/{classmember}', [Controllers\ExculmemberController::class, 'detach_excul_member'])->name('detach_excul_member');

    Route::resource('exculs', Controllers\ExculController::class);
    Route::patch('exculs/pembina/{excul}', [Controllers\ExculController::class, 'pembina'])->name('exculs.pembina');

    Route::resource('projects', Controllers\ProjectController::class);

    Route::middleware('admin')->group(function () {
        Route::resource('school', Controllers\SchoolController::class)->only(['index', 'edit', 'update']);
        Route::get('users', [Controllers\UserController::class, 'index'])->name('users.index');
        Route::put('users/{user}', [Controllers\UserController::class, 'reset_password'])->name('users.reset_password');
        Route::resource('tapels', Controllers\TapelController::class);
    });


    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/test-upload', function (Request $request) {
    dd($request->all());
});

require __DIR__ . '/location.php';
require __DIR__ . '/project.php';
require __DIR__ . '/auth.php';
