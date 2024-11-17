<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'welcome'])->name('welcome');


Route::get('/login', function () {
    return view('user.login');
});
Route::get('/register', function () {
    return view('user.register');
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {

    // Grup route untuk Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/mobil', [AdminController::class, 'mobil'])->name('admin.mobil');
        Route::get('/mobil/tambah', [AdminController::class, 'tambah'])->name('admin.mobil.tambah');
        Route::post('/mobil/store', [AdminController::class, 'store'])->name('admin.mobil.store');
        Route::get('/mobil/{id}/edit', [AdminController::class, 'edit'])->name('admin.mobil.edit');
        Route::put('/mobil/{id}/update', [AdminController::class, 'update'])->name('admin.mobil.update');
        Route::delete('/mobil/{id}/hapus', [AdminController::class, 'hapus'])->name('admin.mobil.hapus');
        
        Route::get('/mobil/rental', [AdminController::class, 'rental'])->name('admin.rental');
        Route::put('/mobil/rental/{id}/berjalan', [AdminController::class, 'rental_update'])->name('admin.update.berjalan');
        Route::delete('/mobil/{id}/hapus', [AdminController::class, 'deleteRental'])->name('admin.rental.hapus');
        
        Route::get('/mobil/return', [AdminController::class, 'return'])->name('admin.return');
        Route::post('/mobil/return', [AdminController::class, 'processReturn'])->name('admin.return.process');
    });

    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/user/mobil', [UserController::class, 'index'])->name('user.mobil');
        Route::get('/user/mobil/{id}', [UserController::class, 'show'])->name('user.mobil.show');
        Route::post('/user/mobil/{id}/rental', [UserController::class, 'rental'])->name('user.mobil.rental');
        Route::get('/user/rentals', [UserController::class, 'rentals'])->name('user.rentals');
        Route::get('/user/rentals/{id}', [UserController::class, 'detailRentals'])->name('user.rentals.detail');
        Route::get('/user/return', [UserController::class, 'return'])->name('user.return');
        Route::post('/user/return', [UserController::class, 'returnProcess'])->name('user.return.process');
    });
});

