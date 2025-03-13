<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LevelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);

// Resource Controller
Route::resource('photos', PhotoController::class);

// Route dasar
// Route::get('/', [HomeController::class, 'index']);

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', function () {
    return 'Alyssa Tifara Yuwono (2341760164)';
});

// Route dengan parameter
Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

// Route dengan parameter ganda
Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . ' Komentar ke-' . $commentId;
});

Route::resource('posts', PostController::class);

// Route dengan prefix
Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// Route dengan middleware
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// Route untuk profile

// Redirect dan view
Route::redirect('/here', '/there');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Route dengan subdomain
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        return "Akun: $account, User ID: $id";
    });
});

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('/greeting', [WelcomeController::class, 'greeting']);

Route::prefix('category')->group(function () {
    Route::get('/{category}', [ProductController::class, 'showCategory']);
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/kategori', [ProductController::class, 'showCategory']);

Route::get('/penjualan', [PenjualanController::class, 'showPenjualan']);

Route::get('/userPOS', [UserController::class, 'showUser']);
