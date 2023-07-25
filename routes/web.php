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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login',[AuthController::class, 'auth']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/createUser',[UserController::class,'store']);

Route::get('/pemilih', [PemilihController::class, 'index']);
Route::post('/pemilih-tambah', [PemilihController::class, 'store']);
Route::post('/pemilih-edit/{id}', [PemilihController::class, 'edit']);
