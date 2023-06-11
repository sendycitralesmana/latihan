<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController as DashboardController;
use App\Http\Controllers\Backend\CustomerController as CustomerController;
use App\Http\Controllers\StudentsController as StudentsController;
use App\Http\Controllers\ClassController as ClassController;
use App\Http\Controllers\EkskulController as EkskulController;
use App\Http\Controllers\TeacherController as TeacherController;
use App\Http\Controllers\AuthController as AuthController;

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
})->middleware('auth');



Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/add', [CustomerController::class, 'add']);
Route::post('/customer/create', [CustomerController::class, 'create']);
Route::get('/customer/edit', [CustomerController::class, 'edit']);
Route::post('/customer/{id}/update', [CustomerController::class, 'update']);
Route::get('/customer/{id}/delete', [CustomerController::class, 'delete']);

// ctrl p RouteServiceProvider untuk mengetahui url route mana jika kita sudah login 
// maka tidak bisa mengakses url route login kembali

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// all role
Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard/backend', [DashboardController::class, 'index']);

    // Student
    Route::get('/students', [StudentsController::class, 'index']);

    // Class
    Route::get('/class', [ClassController::class, 'index']);
    Route::get('/class/{id}/detail', [ClassController::class, 'detail']);

    // Ekskul
    Route::get('/ekskuls', [EkskulController::class, 'index']);
    Route::get('/ekskuls/{id}/detail', [EkskulController::class, 'detail']);

    // Teacher
    Route::get('/teachers', [TeacherController::class, 'index']);
    
});

// role admin
Route::group(['middleware' => ['auth', 'admin']], function(){

    // student
    Route::get('/students/show_delete', [StudentsController::class, 'show_delete']);
    Route::get('/students/{id}/delete', [StudentsController::class, 'delete']);
    Route::get('/students/{id}/restore', [StudentsController::class, 'restore']);

    // class
    Route::get('/class/show_delete', [ClassController::class, 'show_delete']);
    Route::get('/class/add', [ClassController::class, 'add']);
    Route::post('/class/create', [ClassController::class, 'create']);
    Route::get('/class/{id}/edit', [ClassController::class, 'edit']);
    Route::put('/class/{id}/update', [ClassController::class, 'update']);
    Route::get('/class/{id}/delete', [ClassController::class, 'delete']);
    Route::get('/class/{id}/restore', [ClassController::class, 'restore']);

    // ekskul
    Route::get('/ekskuls/show_delete', [EkskulController::class, 'show_delete']);
    Route::get('/ekskuls/add', [EkskulController::class, 'add']);
    Route::post('/ekskuls/create', [EkskulController::class, 'create']);
    Route::get('/ekskuls/{id}/edit', [EkskulController::class, 'edit']);
    Route::put('/ekskuls/{id}/update', [EkskulController::class, 'update']);
    Route::get('/ekskuls/{id}/delete', [EkskulController::class, 'delete']);
    Route::get('/ekskuls/{id}/restore', [EkskulController::class, 'restore']);

    // teacher
    Route::get('/teachers/show_delete', [TeacherController::class, 'show_delete']);
    Route::get('/teachers/add', [TeacherController::class, 'add']);
    Route::post('/teachers/create', [TeacherController::class, 'create']);
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']);
    Route::get('/teachers/{id}/detail', [TeacherController::class, 'detail']);
    Route::put('/teachers/{id}/update', [TeacherController::class, 'update']);
    Route::get('/teachers/{id}/delete', [TeacherController::class, 'delete']);
    Route::get('/teachers/{id}/restore', [TeacherController::class, 'restore']);

});

// role admin atau teacher
Route::group(['middleware' => ['auth', 'adminOrTeacher']], function(){

    // student
    Route::get('/students/add', [StudentsController::class, 'add']);
    Route::post('/students/create', [StudentsController::class, 'create']);
    Route::get('/students/{id}/edit', [StudentsController::class, 'edit']);
    Route::get('/students/{id}/detail', [StudentsController::class, 'detail']);
    Route::put('/students/{id}/update', [StudentsController::class, 'update']);

});