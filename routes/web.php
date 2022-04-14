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
Route::middleware([
    'auth',
    'middleware' => 'throttle:60,1',
    'middleware' => 'role:super_admin|admin',
    // 'middleware' => 'role:admin',
    ])->group(function(){
        //admin route 
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
        Route::get('/change_password',[AdminController::class, 'change_password'])->name('change_password');
        Route::post('/handle_change_password',[AdminController::class, 'handle_change_password']);
        Route::get('/profile',[AdminController::class, 'profile'])->name('profile');
        Route::post('/handle_change_profile_picture',[AdminController::class, 'handle_change_profile_picture']);
        Route::get('/under_construction',[AdminController::class, 'under_construction'])->name('under_construction');
        //post route
        Route::get('/post',[PostController::class, 'index'])->name('post');
        Route::prefix('/post')->group( function () {
            Route::get('/show/{id}',[PostController::class, 'show']);
            Route::post('/store',[PostController::class, 'store']);
            Route::get('/create',[PostController::class, 'create']);
            Route::get('/edit/{id}',[PostController::class, 'edit']);
            Route::post('/update/{id}',[PostController::class, 'update']);
            Route::get('/delete/{id}',[PostController::class, 'delete']);
            Route::get('destroy/{id}',[PostController::class, 'destroy']);
        });
        // user route
        Route::get('/user',[UserController::class, 'index'])->name('user');
        Route::prefix('/user')->group( function () {
            Route::get('/show/{id}',[UserController::class, 'show']);
            Route::post('/store',[UserController::class, 'store']);
            Route::get('/create',[UserController::class, 'create']);
            Route::get('/edit/{id}',[UserController::class, 'edit']);
            Route::post('/update/{id}',[UserController::class, 'update']);
            Route::post('/mutiple_delete',[UserController::class, 'mutiple_delete']);
            Route::get('/undo_delete/{id}',[UserController::class, 'undo_delete']);
            Route::get('/delete/{id}',[UserController::class, 'delete']);
            Route::get('/destroy/{id}',[UserController::class, 'destroy']);
            Route::get('/search',[UserController::class, 'search']);
            Route::get('/handle_search',[UserController::class, 'handle_search']);
            Route::get('/test',[UserController::class, 'test'])->name('test');
        });
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

});

Route::middleware(['middleware' => 'throttle:60,1',])->group(function(){
    Route::get('/login',[AdminController::class, 'login'])->name('login');
    Route::get('/register',[AdminController::class, 'register'])->name('register');
    Route::post('/handle_register',[AdminController::class, 'handle_register'])->name('handle_register');
    Route::get('/forget_password',[AdminController::class, 'forget_password'])->name('forget_password');
    Route::post('/handle_login',[AdminController::class, 'handle_login'])->name('handle_login');  
});
