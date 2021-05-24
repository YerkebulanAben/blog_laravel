<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function (){
   Route::get('/', [MainController::class, 'index'])->name('index');
   Route::resource('/categories', CategoryController::class);
   Route::resource('/tags', TagController::class);
   Route::resource('/posts', PostController::class);
});

Route::middleware('guest')->group(function() {
    Route::get('/register', [UserController::class, 'create'])->name('user.register');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('user.loginForm');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
});


Route::get('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');


