<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\LogActivitiesController;
use App\Http\Controllers\StudentEkskulController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AuthController as AuthController;
use App\Http\Controllers\ClassController as ClassController;
use App\Http\Controllers\EkskulController as EkskulController;
use App\Http\Controllers\TeacherController as TeacherController;
use App\Http\Controllers\StudentsController as StudentsController;
use App\Http\Controllers\Backend\CustomerController as CustomerController;
use App\Http\Controllers\Backend\DashboardController as DashboardController;

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
Route::post('/postLogin', [AuthController::class, 'postLogin'])->middleware('guest', 'throttle:login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/registerProcess', [AuthController::class, 'registerProcess'])->middleware('guest');

Route::get('/email/verify', function () {
    return view('auths/verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/profile', function() {
    return view('users/profile');
})->middleware('auth', 'verified');


Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/process-forgot-password', [AuthController::class, 'processForgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/process-reset-password', [AuthController::class, 'processResetPassword'])->middleware('guest')->name('password.update');

// all role
Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard/backend', [DashboardController::class, 'index']);

    // User
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/change-password', [UserController::class, 'changePassword']);
    Route::post('/users/process-change-password', [UserController::class, 'processChangePassword']);

    // Student Ekskul
    Route::get('/attach-detach', [StudentEkskulController::class, 'attackDettach']);

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

    // school
    Route::get('/schools', [SchoolController::class, 'index']);
    Route::get('/schools/export-pdf', [SchoolController::class, 'exportPdf']);

    // post
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{id}/detail', [PostController::class, 'detail']);

    // video
    Route::get('/videos', [VideoController::class, 'index']);
    Route::get('/videos/{id}/detail', [VideoController::class, 'detail']);

    // products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::get('/products/created', [ProductController::class, 'created']);

    // log activities
    Route::get('/log-activities', [LogActivitiesController::class, 'index']);
    Route::get('/log-activities/create', [LogActivitiesController::class, 'create']);

    // country
    Route::get('/countries', [CountryController::class, 'index']);
    Route::get('/countries/upsert', [CountryController::class, 'upsert']);

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
    Route::get('/class/massUpdate', [ClassController::class, 'massUpdate']);  // isi column slug yang masih null

    // ekskul
    Route::get('/ekskuls/show_delete', [EkskulController::class, 'show_delete']);
    Route::get('/ekskuls/add', [EkskulController::class, 'add']);
    Route::post('/ekskuls/create', [EkskulController::class, 'create']);
    Route::get('/ekskuls/{id}/edit', [EkskulController::class, 'edit']);
    Route::put('/ekskuls/{id}/update', [EkskulController::class, 'update']);
    Route::get('/ekskuls/{id}/delete', [EkskulController::class, 'delete']);
    Route::get('/ekskuls/{id}/restore', [EkskulController::class, 'restore']);
    Route::get('/ekskuls/massUpdate', [EkskulController::class, 'massUpdate']);  // isi column slug yang masih null

    // teacher
    Route::get('/teachers/show_delete', [TeacherController::class, 'show_delete']);
    Route::get('/teachers/add', [TeacherController::class, 'add']);
    Route::post('/teachers/create', [TeacherController::class, 'create']);
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']);
    Route::get('/teachers/{id}/detail', [TeacherController::class, 'detail']);
    Route::put('/teachers/{id}/update', [TeacherController::class, 'update']);
    Route::get('/teachers/{id}/delete', [TeacherController::class, 'delete']);
    Route::get('/teachers/{id}/restore', [TeacherController::class, 'restore']);
    Route::get('/teachers/massUpdate', [TeacherController::class, 'massUpdate']);  // isi column slug yang masih null

});

// role admin atau teacher
Route::group(['middleware' => ['auth', 'adminOrTeacher']], function(){

    // student
    Route::get('/students/add', [StudentsController::class, 'add']);
    Route::post('/students/create', [StudentsController::class, 'create']);
    Route::get('/students/{id}/edit', [StudentsController::class, 'edit']);
    Route::get('/students/{id}/detail', [StudentsController::class, 'detail']);
    Route::put('/students/{id}/update', [StudentsController::class, 'update']);
    Route::get('/students/massUpdate', [StudentsController::class, 'massUpdate']);  // isi column slug yang masih null

});

Route::get('/send-email', [SendEmailController::class, 'index']);
Route::get('/email/newsletter', [SendEmailController::class, 'newsletter']);