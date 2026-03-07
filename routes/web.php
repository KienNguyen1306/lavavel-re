<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;

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

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::post('/comment/{id}/like', [CommentController::class, 'like'])
    ->name('comment.like');
Route::post('/movie/{id}/like', [MovieController::class, 'like'])
    ->middleware('auth');
