<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\browseController;

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

    Route::get('/publish', function () {
        return view('publish');
    })->name('publish');
});

Route::get('/crud', [CrudController::class, 'index'])->name('crud');



// For edit
Route::put('/books/update', [BookController::class, 'update'])->name('books.update');
Route::put('/users/update', [UserController::class, 'update'])->name('users.update');

// For delete
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// For add
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/storeAdmin', [BookController::class, 'storeAdmin'])->name('books.storeAdmin');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::resource('books', BookController::class);
Route::resource('users', UserController::class);

Route::get('/browse', [browseController::class, 'index'])->name('browse');
