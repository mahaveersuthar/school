<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;


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

Route::get('/', function (Request $request) {
    return view('welcome');
});
Route::get('student',[StudentController::class,'index'])->name('student')->middleware('guard');
Route::get('teachers',[StudentController::class,'teachersInfo'])->name('teachers')->middleware('guard');
Route::post('addTeacher',[StudentController::class,'addTeacher'])->name('addTeacher')->middleware('guard');
Route::post('insert',[StudentController::class,'insert']);
Route::get('destroy/{id}',[StudentController::class,'destroy']);
Route::get('edit/{id}',[StudentController::class,'edit']);
Route::post('update',[StudentController::class,'update']);
Route::get('course',function (){return view('course');})->name('coures')->middleware('guard');
Route::post('course/post',[CourseController::class,'create_course']);
Route::get('student_course',[StudentController::class,'student_course'])->middleware('guard');
Route::post('sumbit',[StudentController::class,'co_st']);
Route::get('fetchCoures',[CourseController::class,'fetchCoures']);
Route::get('del_coures/{id}',[CourseController::class,'del_coures']);
Route::get('teacherDel/{id}',[StudentController::class,'teacherDel']);



Route::get('student_show',[StudentController::class,'student_show']);



// login controller routes

Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard')->middleware('guard');
Route::get('loginPage',[AuthController::class,'index']);
Route::post('login/post', [AuthController::class, 'login'])->name('Auth.login');
Route::get('signup',[AuthController::class,'signup']);
Route::post('signup/post', [AuthController::class, 'Registration'])->name('signup.Registration');
Route::get('logout',[AuthController::class,'logout'])->name('logout')->middleware('guard');
// Route::get('dashboard', [AuthController::class, 'dashboard']);


