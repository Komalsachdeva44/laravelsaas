<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TenantRegisterController;

Route::get('/register', [TenantRegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [TenantRegisterController::class, 'register'])->name('register.submit');
