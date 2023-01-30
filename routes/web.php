<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class , 'index'])->name('home');
Route::post('store', [StudentController::class, 'store'])->name('store');

Route::get('edit/{id}', [StudentController::class , 'edit'])->name('edit');
Route::post('udpdate/{id}', [StudentController::class , 'update'])->name('update');

Route::get('sdelete/{id}' , [StudentController::class, 'softdelete'])->name('soft.delete');

Route::get('trashed', [StudentController::class, 'trash'])->name('trash');
Route::get('restore/{id}', [StudentController::class , 'restore'])->name('restore');
Route::get('fdelete/{id}', [StudentController::class, 'forceDelete'])->name('force.delete');