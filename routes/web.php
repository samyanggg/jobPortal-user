<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('frontpage');
});


Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [UserController::class, 'viewUserDashboard'])->name('viewUserDashboard');
Route::get('/profile', [UserController::class, 'viewProfile'])->name('viewProfile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');


Route::get('/application-form/{id}', [ApplicationFormController::class, 'viewApplicationForm'])->name('viewApplicationForm');
Route::post('/submit/application-form/{id}', [ApplicationFormController::class, 'submitApplicationForm'])->name('submitApplicationForm');

Route::get('/view-notification', [NotificationController::class, 'viewNotification'])->name('viewNotification');


