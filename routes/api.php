<?php

// use App\Http\Controllers\BusinessDetailController;
// use App\Http\Controllers\CustomManageController;
// use App\Http\Controllers\DashboardController;

// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::post('/dashboard', [DashboardController::class, 'store']);
// Route::get('/dashboard/{id}', [DashboardController::class, 'show']);
// Route::put('/dashboard/{id}', [DashboardController::class, 'update']);
// Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy']);

// Route::get('customManage', [CustomManageController::class, 'index']);
// Route::post('customManage', [CustomManageController::class, 'store']);
// Route::get('customManage/{id}', [CustomManageController::class, 'show']);
// Route::put('customManage/{id}', [CustomManageController::class, 'update']);
// Route::delete('customManage/{id}', [CustomManageController::class, 'destroy']);

// Route::get('businessDetail', [BusinessDetailController::class, 'index']);
// Route::post('businessDetail', [BusinessDetailController::class, 'store']);
// Route::get('businessDetail/{id}', [BusinessDetailController::class, 'show']);
// Route::put('businessDetail/{id}', [BusinessDetailController::class, 'update']);
// Route::delete('businessDetail/{id}', [BusinessDetailController::class, 'destroy']);

use App\Http\Controllers\Api\CangKuController;
use App\Http\Controllers\Api\CaoZuoController;
use App\Http\Controllers\Api\ChanPinXianController;
use App\Http\Controllers\Api\FaHuoDanController;

Route::get('/cangku', [CangKuController::class, 'index']);
Route::get('/chanpinxian', [ChanPinXianController::class, 'index']);
Route::get('/caozuo', [CaoZuoController::class, 'index']);
Route::get('/fahuo', [FaHuoDanController::class, 'index']);


// Test koneksi database
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Connected to SQL Server successfully!";
    } catch (\Exception $e) {
        return "Connection failed: " . $e->getMessage();
    }
});
