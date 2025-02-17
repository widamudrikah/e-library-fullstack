<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::controller(DashboardAdminController::class)->group(function() {
        Route::get('/dasboard', 'index')->name('admin.dashboard');
    });

    Route::controller(CategoryController::class)->group(function() {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/store', 'store')->name('category.store');
        Route::put('/category/update/{id}', 'update')->name('category.update');
    });

    Route::controller(StudentController::class)->group(function() {
        Route::get('/student', 'index')->name('student');
        
    });

    Route::controller(BookController::class)->group(function() {
        Route::get('/book', 'index')->name('book');
        Route::get('/book/create', 'create')->name('book.create');
        Route::get('/book/{id}', 'detail')->name('book.detail');
        Route::post('/book/store', 'store')->name('book.store');
        Route::get('/book/edit/{id}', 'edit')->name('book.edit');
        Route::put('/book/update/{id}', 'update')->name('book.update');
        Route::delete('/book/delete/{id}', 'destroy')->name('book.destroy');
    });
});


// Student
Route::prefix('student')->middleware('auth')->group(function() {
    Route::controller(DashboardStudentController::class)->group(function() {
        Route::get('/dasboard', 'index')->name('student.dashboard');
    });
});