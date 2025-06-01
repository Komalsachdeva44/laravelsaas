<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantRegisterController;
use App\Http\Controllers\CompanyDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Welcome Page (optional)
Route::get('/', function () {
    return view('welcome');
});

// ✅ Tenant Registration Routes
Route::get('/register', [TenantRegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [TenantRegisterController::class, 'register'])->name('register.submit');

// ✅ Company Details Routes (after registration)
Route::get('/company-details/{user}', [CompanyDetailController::class, 'showForm'])->name('company.details.form');
Route::post('/company-details/{user}', [CompanyDetailController::class, 'store'])->name('company.details.store');

// ✅ Tenant Login Routes
Route::get('/login', [TenantRegisterController::class, 'showLoginForm'])->name('tenant.login');
Route::post('/login', [TenantRegisterController::class, 'login'])->name('tenant.login.submit');

// ✅ Tenant Dashboard Route (can be protected with middleware)
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
