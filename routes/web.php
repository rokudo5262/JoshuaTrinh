<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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
Route::prefix('/admin')->group(function(){
    Route::middleware([
        'auth',
        'middleware' => 'throttle:60,1',
        'middleware' => 'role:super_admin|admin',
        ])->group(function(){
            //admin route 
            Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
            Route::get('/change_password',[AdminController::class, 'change_password'])->name('change_password');
            Route::post('/handle_change_password',[AdminController::class, 'handle_change_password'])->name('handle_change_password');
            Route::get('/profile',[AdminController::class, 'profile'])->name('profile');
            Route::post('/handle_change_profile_picture',[AdminController::class, 'handle_change_profile_picture']);
            Route::get('/under_construction',[AdminController::class, 'under_construction'])->name('under_construction');
            Route::get('/setting',[AdminController::class, 'setting'])->name('setting');
            //post route
            Route::get('/post',[PostController::class, 'index'])->name('post');
            Route::prefix('/post')->group( function () {
                Route::get('/show/{id}',[PostController::class, 'show'])->name('post.show');
                Route::post('/store',[PostController::class, 'store'])->name('post.store');
                Route::get('/create',[PostController::class, 'create'])->name('post.create');
                Route::post('/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
                Route::post('/update/{id}',[PostController::class, 'update'])->name('post.update');
                Route::post('/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
                Route::post('destroy/{id}',[PostController::class, 'destroy'])->name('post.destroy');
            });
            // user route
            Route::get('/user',[UserController::class, 'index'])->name('user');
            Route::prefix('/user')->group( function () {
                Route::get('/show/{id}',[UserController::class, 'show'])->name('user.show');
                Route::post('/store',[UserController::class, 'store'])->name('user.store');
                Route::get('/create',[UserController::class, 'create'])->name('user.create');
                Route::get('/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
                Route::post('/update/{id}',[UserController::class, 'update'])->name('user.update');
                Route::post('/profile_upload/{id}',[UserController::class, 'profile_upload'])->name('user.profile_upload');
                Route::post('/mutiple_delete',[UserController::class, 'mutiple_delete'])->name('user.mutiple_delete');
                Route::post('/undo_delete/{id}',[UserController::class, 'undo_delete'])->name('user.undo_delete');
                Route::post('/delete/{id}',[UserController::class, 'delete'])->name('user.delete');
                Route::post('/destroy/{id}',[UserController::class, 'destroy'])->name('user.destroy');
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
});

Route::get('/',[HomeController::class, 'index'])->name('home');