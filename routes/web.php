<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // Check if the user has the 'admin' role
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        return view('dashboard');
    })->name('dashboard');
});

Route::get('/crud', [CrudController::class, 'index'])->name('crud');

Route::get('/publish', function () {
    return view('publish'); // Assuming you have a Blade view named 'publish.blade.php'
})->name('publish');

Route::put('/books/update', [BookController::class, 'update'])->name('books.update');
Route::put('/users/update', [UserController::class, 'update'])->name('users.update');

// For Books delete
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// For Users delete
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::resource('books', BookController::class);
Route::resource('users', UserController::class);
