<?php

use App\Http\Controllers\BillCreateRuleController;
use App\Http\Controllers\BillNOKeyController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BusinessDetailController;
use App\Http\Controllers\CangKuJiBenXinXiController;
use App\Http\Controllers\CaoZuoRiZhiController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\CustomManageController;
use App\Http\Controllers\WeiTuoDanController;

// Root langsung ke halaman weituodan
Route::get('/', function () {
    return redirect()->route('weituodan.index');
});

// Halaman utama Weituodan
Route::get('/weituodan', [WeiTuoDanController::class, 'index'])
    ->name('weituodan.index');
Route::get('/billCreateTule', [BillCreateRuleController::class, 'index'])
    ->name('billCreateRule.index');
Route::get('/billNOKey', [BillNOKeyController::class, 'index'])
    ->name('billNOKey.index');
Route::get('/cangKuJiBenXinXi', [CangKuJiBenXinXiController::class, 'index'])
    ->name('cangKuJiBenXinXi.index');
Route::get('/caoZuoRiZhi', [CaoZuoRiZhiController::class, 'index'])
    ->name('caoZuoRiZhi.index');

// Test koneksi database
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Connected to SQL Server successfully!";
    } catch (\Exception $e) {
        return "Connection failed: " . $e->getMessage();
    }
});


// Jika sudah login, jangan boleh buka login/register
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

//     Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
//     Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
// });

// Logout
// Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Dashboard (hanya boleh jika login)
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])
//         ->name('dashboard.index');
//     Route::get('/customManage', [CustomManageController::class, 'index'])
//         ->name('customManage.index');
//     Route::get('/businessDetail', [BusinessDetailController::class, 'index'])
//         ->name('businessDetail.index');

//     Route::get('/customManage/{id}', [CustomManageController::class, 'show']);
// });


// Redirect root → dashboard jika login, atau → login jika belum login
// Route::get('/', function () {
//     return auth()->check()
//         ? redirect()->route('dashboard.index')
//         : redirect()->route('login');
// });
