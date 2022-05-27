<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmpProjController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\InterviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('layouts.app');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('profile/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('profile/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');


Route::resource('room', RoomController::class);

Route::resource('student', StudentController::class);

Route::resource('attendance', AttendanceController::class);

Route::resource('department', DepartmentController::class);

Route::resource('interview', InterviewController::class);

Route::resource('project', ProjectController::class);

Route::resource('empProj', EmpProjController::class);

Route::resource('learning', LearningController::class);

Route::resource('task', TaskController::class);
Route::get('task/complete/{id}', [App\Http\Controllers\TaskController::class, 'insert'])->name('task.insert');
Route::get('done', [App\Http\Controllers\TaskController::class, 'done'])->name('task.done');

Route::resource('workflow', WorkflowController::class);
Route::get('index', [App\Http\Controllers\WorkflowController::class, 'index'])->name('workflow.index');

Route::post('search', [App\Http\Controllers\StudentController::class, 'search'])->name('student.search');
Route::post('filter', [App\Http\Controllers\StudentController::class, 'filter'])->name('student.filter');
Route::post('create', [App\Http\Controllers\AttendanceController::class, 'filter'])->name('attendance.filter');
Route::get('create/{id}', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendance.create');
Route::get('showAll', [App\Http\Controllers\AttendanceController::class, 'showAll'])->name('attendance.showAll');
Route::get('showBy', [App\Http\Controllers\AttendanceController::class, 'showBy'])->name('attendance.showBy');
Route::post('showBy', [App\Http\Controllers\AttendanceController::class, 'overAll'])->name('attendance.overAll');
Route::get('result', [App\Http\Controllers\AttendanceController::class, 'result'])->name('attendance.result');
//Route::view('result', 'attendance.result')->name('attendance.result');


Route::get('workflow', [App\Http\Controllers\HomeController::class, 'workflow'])->name('home.workflow');
Route::get('showAll', [App\Http\Controllers\DepartmentController::class, 'showAll'])->name('department.showAll');

