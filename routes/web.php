<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');

Route::get('/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('students.create');

Route::post('/store', [\App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
    
Route::get('/edit/{id}', [\App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');

Route::put('/update/{id}', [\App\Http\Controllers\StudentController::class, 'update'])->name('students.update');

Route::delete('/delete/{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('students.delete');