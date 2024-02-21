<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



Route::get('login', [AdminController::class, 'loginForm'])->name('login.form');
Route::post('login-submit', [AdminController::class, 'submitForm'])->name('login.submit');


Route::middleware(['admin'])->group(function () {
    Route::get('student-list', [AdminController::class, 'studentList'])->name('student.list');
    Route::get('student-detail/{id}', [AdminController::class, 'studentDetail'])->name('student.detail');
    Route::post('/update-admission-status/{id}', [AdminController::class, 'updateAdmissionStatus'])->name('student.admit');
});
