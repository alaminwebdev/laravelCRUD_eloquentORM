<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class , 'index'])->name('home');
Route::post('store', [StudentController::class, 'store'])->name('store');
