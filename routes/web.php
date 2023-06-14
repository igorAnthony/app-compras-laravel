<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::post('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/register', [AuthController::class, 'register'])->name('register');

Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');


Route::get('/admin', function () {
    return view('login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/produtos', [ProductController::class, 'index'])->name('admin.produtos.index');
    Route::get('/produtos/create', [ProductController::class, 'create'])->name('admin.produtos.create');
    Route::post('/produtos', [ProductController::class, 'store'])->name('admin.produtos.store');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('admin.produtos.show');
    Route::get('/produtos/{id}/edit', [ProductController::class, 'edit'])->name('admin.produtos.edit');
    Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('admin.produtos.update');
    Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('admin.produtos.destroy');

    
});

