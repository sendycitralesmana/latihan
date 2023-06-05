<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController as DashboardController;
use App\Http\Controllers\Backend\CustomerController as CustomerController;
use App\Http\Controllers\StudentsController as StudentsController;
use App\Http\Controllers\ClassController as ClassController;
use App\Http\Controllers\EkskulController as EkskulController;

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

Route::get('/dashboard/backend', [DashboardController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/add', [CustomerController::class, 'add']);
Route::post('/customer/create', [CustomerController::class, 'create']);
Route::get('/customer/edit', [CustomerController::class, 'edit']);
Route::post('/customer/{id}/update', [CustomerController::class, 'update']);
Route::get('/customer/{id}/delete', [CustomerController::class, 'delete']);

// Student
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/add', [StudentsController::class, 'add']);
Route::post('/students/create', [StudentsController::class, 'create']);
Route::get('/students/edit', [StudentsController::class, 'edit']);
Route::post('/students/{id}/update', [StudentsController::class, 'update']);
Route::get('/students/{id}/delete', [StudentsController::class, 'delete']);

// Class
Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/add', [ClassController::class, 'add']);
Route::post('/class/create', [ClassController::class, 'create']);
Route::get('/class/edit', [ClassController::class, 'edit']);
Route::post('/class/{id}/update', [ClassController::class, 'update']);
Route::get('/class/{id}/delete', [ClassController::class, 'delete']);

// Ekskul
Route::get('/ekskuls', [EkskulController::class, 'index']);
Route::get('/ekskuls/add', [EkskulController::class, 'add']);
Route::post('/ekskuls/create', [EkskulController::class, 'create']);
Route::get('/ekskuls/edit', [EkskulController::class, 'edit']);
Route::post('/ekskuls/{id}/update', [EkskulController::class, 'update']);
Route::get('/ekskuls/{id}/delete', [EkskulController::class, 'delete']);