<?php
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;


Route::get('/', [IndexController::class, 'index']);
Route::get('/show',[IndexController::class, 'show'])->middleware(['web', 'auth']);

Route::resource('listing', ListingController::class)->only(['create','store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::resource('listing', ListingController::class)->except(['create','store', 'edit', 'update', 'destroy']);
// Login routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::DELETE('logout', [AuthController::class, 'destroy'])->name('logout');



Route::resource('user-account',UserAccountController::class)->only(['create']);