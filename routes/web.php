<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentClassController;


Route::resources([
    'courses' => CourseController::class,
    'students' => StudentController::class,
    'teachers' => TeacherController::class,
    'classes' => ClassController::class,
    'payments' => PaymentController::class,
    'certificates' => CertificateController::class,
    'notifications' => NotificationController::class,
    'users' => UserController::class,
    'roles' => RoleController::class,
    'branches' => BranchController::class,
    'institutes' => InstituteController::class,
    'attendance' => AttendanceController::class,
    'student-classes' => StudentClassController::class
]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
