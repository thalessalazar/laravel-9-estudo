<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\Admin\CommentController;

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

Route::middleware(['auth'])->group(function () {
    Route::delete('/users/{idUser}/comments/{idComment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/users/{idUser}/comments/{idComment}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('/users/{idUser}/comments/{idComment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/users/{idUser}/comments/{idComment}', [CommentController::class, 'update'])->name('comments.update');

    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
