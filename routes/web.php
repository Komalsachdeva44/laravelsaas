<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantRegisterController;
use App\Http\Controllers\CompanyDetailController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [TenantRegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [TenantRegisterController::class, 'register'])->name('register.submit');
Route::get('/company-details/{user}', [CompanyDetailController::class, 'showForm'])->name('company.details.form');
Route::post('/company-details/{user}', [CompanyDetailController::class, 'store'])->name('company.details.store');
