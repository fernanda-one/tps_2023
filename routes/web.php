<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemilihController;
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
    return view('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class, 'auth']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard-edit/{id}', [DashboardController::class, 'updateStatus']);

Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::post('/create-user',[UserController::class,'store'])->middleware('auth');
Route::put('/edit-user/{id}',[UserController::class,'update'])->middleware('auth');
Route::delete('/users/delete/{id}',[UserController::class,'destroy'])->middleware('auth');

Route::get('/pemilih', [PemilihController::class, 'index'])->middleware('auth');
Route::post('/pemilih-tambah', [PemilihController::class, 'store'])->middleware('auth');
Route::put('/pemilih-edit/{id}', [PemilihController::class, 'edit'])->middleware('auth');
