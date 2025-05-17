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
use App\Http\Controllers\AuthController;


Route:: pattern('id','[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// Form Register
// Route:: get('register', [AuthController::class, 'register'])->name('register')->middleware('guest');
// Route:: post('register', [AuthController::class, 'postregister'])->name('postregister')->middleware('guest');

// Profile
Route::get('profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('profile/update', [AuthController::class, 'update'])->middleware('auth');

Route:: middleware(['auth'])->group(function(){ // artinya semua route di dalam group ini harus login dulu

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth', 'authorize:ADM'])->prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// artinya semua route di dalam group ini harus punya role ADM (Administrator) dan MNG (Manager)
Route::middleware(['authorize:ADM,MNG'])->group(function(){
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang/list', [BarangController::class, 'list']);
    Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']); // ajax form create
    Route::post('/barang_ajax', [BarangController::class, 'store_ajax']); // ajax store
    Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // ajax form edit
    Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update
    Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm
    Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // ajax delete
});

Route::middleware(['auth', 'authorize:ADM,MNG'])->prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); //menampilkan halaman form edit Barang ajax
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); //menyimpan perubahan data Barang ajax
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); //untuk menampilkan form confirm delete Barang ajax
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); //menghapus data Barang ajax
    Route::delete('/{id}', [BarangController::class, 'destroy']);
    Route::get('/import', [BarangController::class, 'import']);
    // Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
    Route::get('/export', [BarangController::class, 'export']); //export excel
    Route::get('/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
});


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

});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
