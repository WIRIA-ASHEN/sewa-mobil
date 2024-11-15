<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('user.login');
});
Route::get('/register', function () {
    return view('user.register');
});

Route::post('register', [AuthController::class, 'register']);
Route::post('/login-akun', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);