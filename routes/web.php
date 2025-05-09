<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [CourseRegistrationController::class, 'index'])->name('home');
Route::post('course-registration', [CourseRegistrationController::class, 'submitRegistration'])->name('frontend.registration.store');
Route::post('/registration/confirm', [CourseRegistrationController::class, 'confirm'])->name('registration.confirm');
Route::post('/registration/submit', [CourseRegistrationController::class, 'submit'])->name('registration.submit');

Route::get('/admin/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('backend.pages.login');
})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');


Route::middleware('auth')->group(function () {
    Route::get('student/register', [AdminController::class, 'studentRegister'])->name('students.index');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('course/master', [AdminController::class, 'courseMaster'])->name('course.master');
    
    Route::get('course/add/',function(){
        return view('backend.pages.courseAdd');
    })->name('add.course.view');

    Route::post('course/add/', [AdminController::class, 'CourseAdd'])->name('add.course');

    Route::get('courses/edit/{id}', [AdminController::class, 'CourseEdit'])->name('courses.edit');
    Route::post('courses/edit/{id}', [AdminController::class, 'CourseUpdate'])->name('courses.update');

    Route::post('courses/delete/{id}', [AdminController::class, 'CourseDelete'])->name('course.delete');
    // Route::get('courses/delete/{id}', [AdminController::class, 'dashboard'])->name('courses.delete');
    Route::get('/students/export', [AdminController::class, 'exportStudents'])->name('students.export');

});
// Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
// web.php
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
})->name('logout');


