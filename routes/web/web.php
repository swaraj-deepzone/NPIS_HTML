<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/user-profile', function () {
        return view('admin.userprofile');
    })->name('admin.userprofile');

    Route::get('/daftar-pengguna-baharu', function () {
        return view('admin.add_new_user');
    })->name('admin.add_new_user');
    
    Route::get('pengasahan-pengguna-baharu', [UserController::class, 'index']);
    Route::get('user-verification/list', [UserController::class, 'getUsers'])->name('user-verification.list');
});