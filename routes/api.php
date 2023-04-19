<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'api.'], function () {
    Route::get('users/{id}/posts', [UserController::class, 'getPostsUser']);
    Route::get('users/{id}/todos', [UserController::class, 'getCommentsPublicUser']);
    Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
    Route::get('posts/{id}/comments', [PostController::class, 'getCommentsPost']);
    Route::resource('posts', PostController::class, ['only' => ['index', 'store', 'show']]);
    Route::resource('comments', CommentController::class, ['only' => ['index', 'store', 'show']]);
    Route::resource('todos', TodoController::class, ['only' => ['index', 'store', 'destroy']]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
