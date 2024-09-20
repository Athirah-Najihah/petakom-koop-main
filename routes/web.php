<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\PermissionController;

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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('payments', PaymentController::class);
        Route::resource('products', ProductController::class);
        Route::resource('receipts', ReceiptController::class);
        Route::resource('rosters', RosterController::class);
        Route::resource('sales', SaleController::class);
        Route::resource('users', UserController::class);

        Route::get('timetable', [RosterController::class, 'timetable'])->name('rosters.timetable');
    });

    Route::get('/restock', [ProductController::class, 'restock'])->name('restock.index');
    Route::post('/restock', [ProductController::class, 'updateRestock'])->name('restock.update');
