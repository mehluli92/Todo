<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Auth::routes();

//home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User management routes
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/users/create', [App\Http\Controllers\HomeController::class, 'createUser'])->name('users.create');
Route::post('/users/store', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('users.store');
Route::get('/users/{id}', [App\Http\Controllers\HomeController::class, 'viewUser'])->name('users.view');
Route::get('/users/{id}/edit', [App\Http\Controllers\HomeController::class, 'editUser'])->name('users.edit');
Route::put('/users/{id}', [App\Http\Controllers\HomeController::class, 'updateUser'])->name('users.update');
Route::delete('/users/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('users.delete');

//task management routes
Route::resource('tasks', TaskController::class);
