<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/posts');
})->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// Data users
Route::get('/users',[UserController::class,'index'])->name('users.index');

Route::resource('/posts', \App\Http\Controllers\PostController::class);

   // Simpan komentar baru pada post tertentu
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
         ->name('comments.store');

    // Simpan balasan untuk komentar tertentu
Route::post('comments/{parent}/reply', [CommentController::class, 'reply'])->name('comments.reply');


