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
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;

Route::get('/', [WelcomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']); //menampilkan halamann awal user
    Route::post('/list', [UserController::class, 'list']); //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // menyimpan data user baru
    // js6
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); //menampilkan halaman form tambah user ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); //menyimpan data user baru ajax
    Route::get('/{id}', [UserController::class, 'show']); //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); //menyimpan perubahan data user
    // js6
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); //menampilkan halaman form edit user ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); //menyimpan perubahan data user ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); //untuk menampilkan form confirm delete user ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); //menghapus data user ajax

    Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
});


Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Create dengan ajax
Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
Route::post('/ajax', [LevelController::class, 'store_ajax']); // menyimpan data level baru ajax
// Edit dengan ajax
Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // menampilkan halaman form edit level ajax
Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // menyimpan perubahan data level ajax
// Delete dengan ajax
Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); //menampilkan form confirm delete level ajax
Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // menghapus data level ajax

// Create dengan ajax
Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah kategori ajax
Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data kategori baru ajax
// Edit dengan ajax
Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // menampilkan halaman form edit kategori ajax
Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // menyimpan perubahan data kategori ajax
// Delete dengan ajax
Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); //menampilkan form confirm delete kategori ajax
Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // menghapus data kategori ajax

// Create dengan ajax
Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
Route::post('/ajax', [SupplierController::class, 'store_ajax']);
// Edit dengan ajax
Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
// Delete dengan ajax
Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);

// Create dengan ajax
Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
Route::post('/ajax', [BarangController::class, 'store_ajax']);
// Edit dengan ajax
Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
// Delete dengan ajax
Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);

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

// // Route dengan middleware
// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// // Route untuk profile

// // Redirect dan view
// Route::redirect('/here', '/there');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// // Route dengan subdomain
// Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         return "Akun: $account, User ID: $id";
//     });
// });

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

// Route::get('/', [HomeController::class, 'index']);

// Route::get('/kategori', [ProductController::class, 'showCategory']);

Route::get('/penjualan', [PenjualanController::class, 'showPenjualan']);

Route::get('/userPOS', [UserController::class, 'showUser']);
