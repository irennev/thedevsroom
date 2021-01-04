<?php

use Illuminate\Support\Facades\Route;


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
});



Auth::routes();

Route::resource('posts', 'App\Http\Controllers\PostController');
Route::resource('comments', 'App\Http\Controllers\CommentController');
Route::resource('categories', 'App\Http\Controllers\CommentController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/manage-posts', [App\Http\Controllers\HomeController::class, 'adminManagePosts'])->name('manageposts')->middleware('is_admin');