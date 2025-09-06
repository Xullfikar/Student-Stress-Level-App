<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin', [UsersController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', 'role:admin']);

Route::get('/admin/create', [UsersController::class, 'create'])->name('admin.create')->middleware(['auth', 'role:admin']);
Route::post('/admin', [UsersController::class, 'store'])->name('admin.store')->middleware(['auth', 'role:admin']);

Route::get('/admin/{user}/update', [UsersController::class, 'update'])->name('admin.update')->middleware(['auth', 'role:admin']);
Route::put('/admin/{user}', [UsersController::class, 'updateUser'])->name('admin.updateUser')->middleware(['auth', 'role:admin']);
Route::delete('/admin/{user}', [UsersController::class, 'destroy'])->name('admin.destroy')->middleware(['auth', 'role:admin']);

Route::get('/admin/delete', [UsersController::class, 'delete'])->name('admin.delete')->middleware(['auth', 'role:admin']);
Route::get('/admin/manage', [UsersController::class, 'manage'])->name('admin.manage')->middleware(['auth', 'role:admin']);
Route::get('/admin/students', [UsersController::class, 'studentData'])->name('admin.student-data')->middleware(['auth', 'role:admin']);

// Teacher
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.dashboard')->middleware(['auth', 'role:teacher']);
Route::get('/teacher/detail-analysis', [TeacherController::class, 'viewDetail'])->name('teacher.view-detail')->middleware(['auth', 'role:teacher']);
Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile')->middleware(['auth', 'role:teacher']);

// Student
Route::get('/student', [StudentController::class, 'index'])->name('student.home')->middleware(['auth', 'role:student']);
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create')->middleware(['auth', 'role:student']);
Route::post('/student', [StudentController::class, 'store'])->name('student.store')->middleware(['auth', 'role:student']);
Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile')->middleware(['auth', 'role:student']);
