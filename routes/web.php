<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

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


Route::middleware(['auth','middleware' => 'throttle:20,1',])->group(function(){
    Route::get('/user',[UserController::class, 'index'])->name('user');
    Route::get('/user/show/{id}',[UserController::class, 'show']);
    Route::post('/user/store',[UserController::class, 'store']);
    Route::get('/user/create',[UserController::class, 'create']);
    Route::get('/user/edit/{id}',[UserController::class, 'edit']);
    Route::post('/user/update/{id}',[UserController::class, 'update']);
    Route::post('/user/mutiple_delete',[UserController::class, 'mutiple_delete']);
    Route::get('/user/undo_delete/{id}',[UserController::class, 'undo_delete']);
    Route::get('/user/delete/{id}',[UserController::class, 'delete']);
    Route::get('/user/destroy/{id}',[UserController::class, 'destroy']);
    Route::get('/user/search',[UserController::class, 'search']);
    Route::get('/user/handle_search',[UserController::class, 'handle_search']);
});

Route::middleware(['auth','middleware' => 'throttle:20,1',])->group(function(){
    Route::get('/post',[PostController::class, 'index'])->name('post');
    Route::post('/post/store',[PostController::class, 'store']);
    Route::get('/post/create',[PostController::class, 'create']);
    Route::get('/post/edit/{id}',[PostController::class, 'edit']);
    Route::post('/post/update/{id}',[PostController::class, 'update']);
    Route::get('/post/delete/{id}',[PostController::class, 'delete']);
    Route::get('/post/destroy/{id}',[PostController::class, 'destroy']);
});

Route::middleware(['auth','middleware' => 'throttle:20,1',])->group(function(){
    Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    Route::get('/change_password',[AdminController::class, 'change_password']);
    Route::post('/handle_change_password',[AdminController::class, 'handle_change_password']);
    Route::get('/profile',[AdminController::class, 'profile']);
    Route::post('/handle_change_profile_picture',[AdminController::class, 'handle_change_profile_picture']);
    Route::get('/under_construction',[AdminController::class, 'under_construction'])->name('under_construction');
});

Route::get('/',[AdminController::class, 'home'])->name('home');
Route::get('/login',[AdminController::class, 'login'])->name('login');
Route::get('/register',[AdminController::class, 'register'])->name('register');
Route::post('/handle_register',[AdminController::class, 'handle_register'])->name('handle_register');
Route::get('/forget_password',[AdminController::class, 'forget_password'])->name('forget_password');
Route::post('/handle_login',[AdminController::class, 'handle_login'])->name('handle_login');