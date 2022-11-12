<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::name('api.users.')
    ->middleware('auth:sanctum')
    ->prefix('user')
    ->group(function () {
        Route::get('/list', [UserController::class, 'getUsers'])->name('users');
        Route::get('/temp/list', [UserController::class, 'getTempUsers'])->name('users.temp');
        Route::get('/details/{id}', [UserController::class, 'userDetails'])->name('users.details');
        Route::get('/details/temp/{id}', [UserController::class, 'userTempDetails'])->name('users.temp.details');
        Route::post('/create', [UserController::class, 'createUser'])->name('users.create');
    });