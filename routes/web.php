<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name("login");

Route::get('/dashboard/deposit', [DepositController::class, 'deposit_view'])->name("dashboard.deposit")->middleware('auth');;
Route::get("/dashboard", [AppController::class, "index"])->middleware('auth');;

Route::post('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/details', [PaymentController::class, 'details'])->name('payment.details');

Route::post('/user/create', [AuthController::class, 'store'])->name("user.create");
Route::post('/user/auth', [AuthController::class, 'login'])->name("auth.login");
