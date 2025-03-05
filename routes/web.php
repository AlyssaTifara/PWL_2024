<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;

// Resource Controller
Route::resource('photos', PhotoController::class);

// Route dasar
Route::get('/', function () {
    return 'Selamat Datang';
});

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
