<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;

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

Route::get('user/count',[UserController::class, 'count_user'])->name('user.count');
Route::apiResource('user', 'App\Http\Controllers\Api\UserController');

Route::get('post/count',[PostController::class, 'count_post'])->name('post.count');
Route::apiResource('post', 'App\Http\Controllers\Api\PostController');

Route::apiResource('comment', 'App\Http\Controllers\Api\CommentController');
