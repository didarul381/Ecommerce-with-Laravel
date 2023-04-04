<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/single-product/{id}', [HomeController::class, 'singleProduct'])->name('single.product');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashbboard');
    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/new-product', [ProductController::class, 'saveProduct'])->name('new.product');

    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage.product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update.product');

    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete.product');

    Route::get('/status-product/{id}', [ProductController::class, 'statusProduct'])->name('status.product');


    Route::get('/add-user', [UserController::class, 'addUser'])->name('add.user');
    Route::post('/new-user', [UserController::class, 'saveUser'])->name('new.user');
    Route::get('/manage-user', [UserController::class, 'manageUser'])->name('manage.user');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
    Route::post('/update-user', [UserController::class, 'updateUser'])->name('update.user');
    Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('delete.user');
});
