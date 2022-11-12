<?php

use App\Http\Controllers\Api\AgensiController;
use App\Http\Controllers\Api\BahagianController;
use App\Http\Controllers\Api\DaerahController;
use App\Http\Controllers\Api\GredJawatanController;
use App\Http\Controllers\Api\JabatanController;
use App\Http\Controllers\Api\JawatanController;
use App\Http\Controllers\Api\JenisPenggunaController;
use App\Http\Controllers\Api\NegeriController;
use Illuminate\Support\Facades\Route;

Route::name('api.lookup.')
    ->middleware('auth:sanctum')
    ->prefix('lookup')
    ->group(function () {
        Route::get('/agensi/list', [AgensiController::class, 'list'])->name('agensi.list');
        Route::get('/bahagian/list', [BahagianController::class, 'list'])->name('bahagian.list');
        Route::get('/daerah/list', [DaerahController::class, 'list'])->name('daerah.list');
        Route::get('/gredjawatan/list', [GredJawatanController::class, 'list'])->name('gred.jawatan.list');
        Route::get('/jabatan/list', [JabatanController::class, 'list'])->name('jabatan.list');
        Route::get('/jawatan/list', [JawatanController::class, 'list'])->name('jawatan.list');
        Route::get('/jenis/pengguna/list', [JenisPenggunaController::class, 'list'])->name('jenis.pengguna.list');
        Route::get('/negeri/list', [NegeriController::class, 'list'])->name('negeri.list');
    });