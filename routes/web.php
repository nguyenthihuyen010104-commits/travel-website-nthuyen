<?php
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});
=======
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPlaceController;

// --- FRONTEND (Người dùng) ---
Route::get('/', [PlaceController::class, 'home']);
Route::get('/places', [PlaceController::class, 'index']);
Route::get('/places/search', [PlaceController::class, 'search']);
Route::get('/places/{id}', [PlaceController::class, 'show']);

// --- XÁC THỰC (Đăng nhập / Đăng ký) ---
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
<<<<<<< HEAD
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);
=======
Route::get('/logout', [AuthController::class, 'logout']);

// --- BACKEND (Quản trị viên) ---
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/users', [AdminController::class, 'users']);

// Quản lý địa điểm
Route::get('/admin/places', [AdminPlaceController::class, 'index']);
Route::get('/admin/places/create', [AdminPlaceController::class, 'create']);
Route::post('/admin/places/store', [AdminPlaceController::class, 'store']);
Route::get('/admin/places/edit/{id}', [AdminPlaceController::class, 'edit']);
Route::post('/admin/places/update/{id}', [AdminPlaceController::class, 'update']);
Route::get('/admin/places/delete/{id}', [AdminPlaceController::class, 'delete']);
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
