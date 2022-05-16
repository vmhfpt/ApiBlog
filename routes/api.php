<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\FooterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('category', [CategoryController::class, 'index']);
Route::get('post', [PostController::class, 'index']);
Route::get('post-more', [PostController::class, 'showMore']);
Route::get('post-detail', [PostController::class, 'show']);
Route::get('category-detail', [PostController::class, 'showCategory']);
Route::post('get-comment', [CommentController::class, 'show']);
Route::post('post-comment', [CommentController::class, 'postComment']);
Route::get('tag-detail', [TagController::class, 'show']);
Route::get('get-footer', [FooterController::class, 'index']);
Route::get('detail-footer', [FooterController::class, 'show']);
//http://127.0.0.1:8000/api/get-footer
