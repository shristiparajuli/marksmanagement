<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('student.index');
// });

// ROUTING FOR STUDENT CRUD OPERATION

Route::get('/',[StudentController::class,'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/create', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/show', [StudentController::class,'show'])->name('student.show');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/edit/{id}', [StudentController::class, 'update'])->name('student.update');
Route::post('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


// Result Route
Route::get('/result',[GradeController::class,'index'])->name('result.index');
Route::get('/result/create', [GradeController::class, 'create'])->name('result.create');
Route::post('/result/create', [GradeController::class, 'store'])->name('result.store');

//Viewing Result 
Route::get('/result/{id}',[ResultController::class,'printResult'])->name('result.index');



