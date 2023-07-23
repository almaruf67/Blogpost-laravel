<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\RegisterController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index']);
Route::resource('/blog', BlogController::class)->middleware('auth');
Route::get('/post/{data}', [BlogController::class, 'show'])->name('post');
Route::resource('/comment', CommentController::class)->middleware('auth');
Route::resource('/profile', UserController::class)->middleware('auth');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('Passchange')->middleware('auth');

Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);
 
Route::get('/admin', function()
{
    return view('admin.panel');
})->name('admin');
// Route::get('/admin/user', [AdminController::class, 'user'])->name('adminuser');
// Route::get('/admin/post', [AdminController::class, 'post'])->name('adminpost');
// Route::get('/admin/comment', [AdminController::class, 'comment'])->name('admincomment');