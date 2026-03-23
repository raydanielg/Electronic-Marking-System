<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\SchoolController;
use App\Http\Controllers\Manager\ProfileController;
use App\Http\Controllers\Manager\SettingController;

// Landing page - redirects to login
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Dashboard/Home page (requires authentication)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Manager Profile Routes
Route::middleware(['auth:manager'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/profile/delete-request', [ProfileController::class, 'requestDeletion'])->name('profile.delete-request');
    
    // System Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // School Management Routes
    Route::resource('schools', SchoolController::class);
    Route::get('/schools-import', [SchoolController::class, 'importPage'])->name('schools.import-page');
    Route::post('/schools-preview', [SchoolController::class, 'preview'])->name('schools.preview');
    Route::post('/schools-import', [SchoolController::class, 'import'])->name('schools.import');
    Route::get('/schools-template', [SchoolController::class, 'downloadTemplate'])->name('schools.download-template');
    Route::get('/schools-check-duplicate', [SchoolController::class, 'checkDuplicate'])->name('schools.check-duplicate');
    Route::get('/schools/{school}/details', [SchoolController::class, 'details'])->name('schools.details');
    Route::get('/districts/{regionId}', [SchoolController::class, 'getDistricts'])->name('districts.by-region');

    // Student Management Routes
    Route::resource('students', StudentController::class);
});
