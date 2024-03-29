<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\RoleApiController;

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

//user
Route::post('user/delete/{id}',[UserApiController::class, 'delete'])->name('userdelete');
Route::get('user/count',[UserApiController::class, 'count_user'])->name('user.count');
Route::apiResource('user', 'App\Http\Controllers\Api\UserApiController');

//post
Route::post('post/delete/{id}',[PostApiController::class, 'delete'])->name('post.delete');
Route::get('post/count',[PostApiController::class, 'count_post'])->name('post.count');
Route::apiResource('post', 'App\Http\Controllers\Api\PostApiController');

//role
Route::post('role/delete/{id}',[RoleApiController::class, 'delete'])->name('role.delete');
Route::get('role/count',[RoleApiController::class, 'count_role'])->name('role.count');
Route::apiResource('role', 'App\Http\Controllers\Api\RoleApiController');

//comment
Route::post('comment/delete/{id}',[CommentApiController::class, 'delete'])->name('comment.delete');
Route::get('comment/count',[CommentApiController::class, 'count_comment'])->name('comment.count');
Route::apiResource('comment', 'App\Http\Controllers\Api\CommentApiController');
