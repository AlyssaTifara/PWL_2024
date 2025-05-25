<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\PenjualanController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [RegisterController:: class, '__invoke'])->name('registers');
Route::post('/register1', App\Http\Controllers\Api\RegisterController::class)->name('register1');
Route::post('/login', [LoginController:: class, '__invoke'])->name('logins');
Route::post('/logout', [LogoutController:: class, '__invoke'])->name('logouts');

//level
Route::get('level', [LevelController:: class, 'index']);
Route::post('level', [LevelController:: class, 'store' ]);
Route::get('level/{level}', [LevelController:: class, 'show' ]);
Route::put('level/{level}', [LevelController::class, 'update' ]);
Route::delete('level/{level}', [LevelController:: class, 'destroy']);

//user
Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'destroy']);

//kategori
Route::get('kategori', [KategoriController::class, 'index']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('kategori/{id}', [KategoriController::class, 'show']);
Route::put('kategori/{id}', [KategoriController::class, 'update']);
Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

//barang
Route::get('barang', [BarangController::class, 'index']);
Route::post('barang', [BarangController::class, 'store']);
Route::get('barang/{id}', [BarangController::class, 'show']);
Route::put('barang/{id}', [BarangController::class, 'update']);
Route::delete('barang/{id}', [BarangController::class, 'destroy']);
Route::delete('/barangs/{barang}', [BarangController::class, 'destroy']);

// Route Transaksi
Route::get('transaksi', [PenjualanController::class, 'index']);
Route::get('transaksi/{transaksi}', [PenjualanController::class, 'show']);
Route::post('transaksi', [PenjualanController::class, 'store']);
Route::post('transaksi/{transaksi}', [PenjualanController::class, 'update']);
Route::delete('transaksi/{transaksi}', [PenjualanController::class, 'destroy']);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/profile', function (Request $request) {
    return $request->user();
});
