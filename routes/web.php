<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
});
// get('/', function () {
//     return view('welcome');
// });

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
        Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
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

    Route::controller(BorrowingController::class)->group(function() {
        Route::get('/borrowing/all', 'borrowingAll')->name('borrowing.all');
        Route::get('/borrowing/unreturned', 'borrowingUnreturned')->name('borrowing.unreturned');
        Route::put('/borrowing/{id}/return', 'returnBook')->name('borrowing.return');
        Route::get('/borrowing/returned', 'borrowingReturned')->name('borrowing.returned');
    });
});


// Student
Route::prefix('student')->middleware('auth')->group(function() {
    Route::controller(DashboardStudentController::class)->group(function() {
        Route::get('/dasboard', 'index')->name('student.dashboard');
        Route::get('/detail/book/{id}', 'show')->name('student.book.show');
        Route::post('/borrow/book/{id}', 'borrow')->name('student.borrow');
        Route::get('/borrow/book/all', 'borrowedBooks')->name('student.borrow.all');

        Route::get('/all/books', 'AllBook')->name('student.all.book');
    });
});