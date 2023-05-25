<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusController;




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

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('post-login',[AuthController::class,'postLogin'])->name('login.post');
Route::get('registration',[AuthController::class,'registration'])->name('register');
Route::post('post-registration',[AuthController::class,'postRegistration'])->name('register.post');
Route::get('dashboard',[AuthController::class,'dashboard']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::middleware('loggedIn')->group(function(){
Route::get('task-list',[TaskController::class,'index']);
Route::get('add-task',[TaskController::class,'addTask']);
Route::post('save-task',[TaskController::class,'saveTask']);
Route::get('edit-task/{id}',[TaskController::class,'editTask']);
Route::post('update-task',[TaskController::class,'updateTask']);
Route::get('delete-task/{id}',[TaskController::class,'deleteTask']);
Route::get('add-status',[StatusController::class,'addStatus']);
Route::post('save-status',[StatusController::class,'saveStatus']);




Route::post('/tasks/search',[TaskController::class,'search'])->name('task.search');

});