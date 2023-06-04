<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController as DashboardController;
use App\Http\Controllers\Backend\CustomerController as CustomerController;
use App\Http\Controllers\ClassController as ClassController;

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

// Class
Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/add', [ClassController::class, 'add']);
Route::post('/class/create', [ClassController::class, 'create']);
Route::get('/class/edit', [ClassController::class, 'edit']);
Route::post('/class/{id}/update', [ClassController::class, 'update']);
Route::get('/class/{id}/delete', [ClassController::class, 'delete']);