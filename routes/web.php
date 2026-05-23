<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    //student management
    Route::get('students', [\App\Http\Controllers\studentmngtController::class, 'index'])->name('student.index');
    route::get('students/create', [\App\Http\Controllers\studentmngtController::class, 'create'])->name('student.create');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    route::get('employee', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
    route::get('employee/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    route::post('employee/store', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
    route::get('employee/{id}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
    route::put('employee/{id}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
    route::delete('employee/{id}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
});
