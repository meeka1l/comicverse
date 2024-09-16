<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

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
