<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\TestAPIController;
use App\Http\Controllers\Admin\FooterController;
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

Route::get('haha', [TestAPIController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return (view('admin.user.login'));
    });
    Route::get('logout', [UserController::class, 'logOut']);
    Route::post('handleloginuser', [UserController::class, 'store'])->name('login.admin.user');
    Route::middleware(['authenticationAdmin'])->group(function () {
        Route::get('dashboard', function () {
            return (view('admin.dashboard'));
        });
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'index']);
            Route::get('edit/{slug}', [CategoryController::class, 'edit']);
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('handleadd', [CategoryController::class, 'store'])->name('category.admin.add');
            Route::post('update/{slug}', [CategoryController::class, 'update'])->name('category.admin.update');
            Route::post('delete', [CategoryController::class, 'destroy']);
        });

        Route::prefix('tag')->group(function () {
            Route::get('list', [TagController::class, 'index']);
            Route::get('edit/{slug}', [TagController::class, 'edit']);
            Route::get('add', [TagController::class, 'create']);
            Route::post('handleadd', [TagController::class, 'store'])->name('tag.admin.add');
            Route::post('update/{slug}', [TagController::class, 'update'])->name('tag.admin.update');
            Route::post('delete', [TagController::class, 'destroy']);
        });

        Route::prefix('post')->group(function () {
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{slug}', [PostController::class, 'edit']);
            Route::get('add', [PostController::class, 'create']);
            Route::post('handleadd', [PostController::class, 'store'])->name('post.admin.add');
            Route::post('update/{slug}', [PostController::class, 'update'])->name('post.admin.update');
            Route::post('delete', [PostController::class, 'destroy']);
        });

        Route::prefix('footer')->group(function () {
           Route::get('list', [FooterController::class, 'index']);
            Route::get('edit/{slug}', [FooterController::class, 'show']);
            Route::get('add', [FooterController::class, 'create']);
            Route::post('handleadd', [FooterController::class, 'store'])->name('footer.admin.add');
            Route::post('update/{slug}', [FooterController::class, 'update'])->name('footer.admin.update');
            Route::post('delete', [FooterController::class, 'destroy']);
        });
    });
});
