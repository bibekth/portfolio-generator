<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('dashboard/')->as('dashboard.')->group(function(){
    Route::get('/',[HomeController::class, 'dashboard']);
    Route::get('/create-website', [HomeController::class, 'createPortfolio'])->name('create.portfolio');
});
