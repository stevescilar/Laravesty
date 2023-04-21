<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;


Route::get('/', [IndexController::class, 'index']);
Route::get('/show',[IndexController::class, 'show']);

// Route::resource('listing', ListingController::class)->only(['index', 'show', 'create','store']);
Route::resource('listing', ListingController::class);

// Login routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::DELETE('logout', [AuthController::class, 'destroy'])->name('logout');



