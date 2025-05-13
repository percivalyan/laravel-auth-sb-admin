<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth', RoleMiddleware::class . ':petugas'])->group(function () {
    Route::view('/petugas/dashboard', 'petugas.dashboard')->name('petugas.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });
