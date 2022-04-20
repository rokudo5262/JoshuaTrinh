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
Route::apiResource('user', 'App\Http\Controllers\Api\UserController');
Route::apiResource('post', 'App\Http\Controllers\Api\PostController');
Route::apiResource('comment', 'App\Http\Controllers\Api\CommentController');

Route::get('user', [UserController::class,'index']);
Route::get('user/{id}', [UserController::class,'show']);
Route::post('user', [UserController::class,'store']);
Route::put('user/{id}', [UserController::class,'update']);
Route::delete('user/{id}', [UserController::class,'destroy']);