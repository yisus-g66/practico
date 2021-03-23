<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CareerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Estudiante
Route::get('student', [StudentController::class,'index'])->name('student.index');
Route::get('student/create', [StudentController::class,'create'])->name('student.create');
Route::post('student', [StudentController::class,'store'])->name('student.store');
Route::get('student/{student}', [StudentController::class,'show'])->name('student.show');
Route::get('student/{student}/edit', [StudentController::class,'edit'])->name('student.edit');
Route::put('student/{student}', [StudentController::class,'update'])->name('student.update');
Route::delete('student/{student}', [StudentController::class,'destroy'])->name('student.destroy');
//Carrera
Route::get('career', [CareerController::class,'index'])->name('career.index');
Route::get('career/{career}/create', [CareerController::class,'create'])->name('career.create');
Route::post('career', [CareerController::class,'store'])->name('career.store');
Route::get('career/{career}', [CareerController::class,'show'])->name('career.show');
Route::get('career/{career}/edit', [CareerController::class,'edit'])->name('career.edit');
Route::put('career/{career}', [CareerController::class,'update'])->name('career.update');
Route::delete('career/{career}', [CareerController::class,'destroy'])->name('career.destroy');

