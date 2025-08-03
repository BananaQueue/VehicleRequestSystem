<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

// Public Dashboard (no login)
Route::get('/', [VehicleController::class, 'index'])->name('dashboard');

// Manual Authentication (raw views)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (logged-in users only)
Route::middleware(['auth'])->group(function () {
    // Vehicle management (Admin)
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

    // Employee management (Admin)
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

    // Vehicle Requests (Employee)
    Route::get('/request', [RequestController::class, 'create'])->name('request.create');
    Route::post('/request/{vehicle}', [RequestController::class, 'store'])->name('request.store');
    Route::post('/return/{vehicle}', [RequestController::class, 'return'])->name('request.return');

    // Show edit form
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');

// Update vehicle info
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');

// Delete vehicle
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

});

