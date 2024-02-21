<?php

use App\Http\Controllers\Frontend\AdmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admission-form', [AdmissionController::class, 'getForm'])->name('admission.form');
Route::post('admission-form-submit', [AdmissionController::class, 'submitForm'])->name('admission.form.submit');
Route::get('check-admission-status', [AdmissionController::class, 'checkAdmissionStatus'])->name('check.admission.status');
Route::POST('admission-status', [AdmissionController::class, 'admissionStatus'])->name('admission.status');


?>
