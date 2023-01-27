<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class , 'index'])->name('home');
Route::post('store', [StudentController::class, 'store'])->name('store');

Route::get('edit/{id}', [StudentController::class , 'edit'])->name('edit');
Route::post('udpdate/{i}', [StudentController::class , 'update'])->name('update');

Route::get('delete/{id}' , [StudentController::class, 'delete'])->name('delete');
