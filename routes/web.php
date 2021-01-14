<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Models\Post;



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

Route::post('/userPosts/{id}', [App\Http\Controllers\ServiceProvider::class, 'userPosts']);
Route::post('/categoryPosts/{id}', [App\Http\Controllers\ServiceProvider::class, 'categoryPosts']);
Route::post('/tagsPosts/{id}', [App\Http\Controllers\ServiceProvider::class, 'categoryPosts']);

Route::resource('posts', 'App\Http\Controllers\PostController');
Route::resource('comments', 'App\Http\Controllers\CommentController');
Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('tags', 'App\Http\Controllers\TagsController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/tags/{tag}', [App\Http\Controllers\TagsController::class, 'index'])->name('tag');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'update_avatar'])->name('update_avatar');
Route::get('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');




Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/manage-posts', [App\Http\Controllers\PostController::class, 'adminManagePosts'])->name('manageposts')->middleware('is_admin');
Route::get('admin/manage-users', [App\Http\Controllers\UserController::class, 'adminManageUsers'])->name('manageusers')->middleware('is_admin');
Route::get('admin/manage-categories', [App\Http\Controllers\CategoryController::class, 'adminManageCategories'])->name('managecategories')->middleware('is_admin');
Route::get('admin/manage-comments', [App\Http\Controllers\CommentController::class, 'adminManageComments'])->name('managecomments')->middleware('is_admin');
Route::get('admin/manage-tags', [App\Http\Controllers\TagsController::class, 'adminManageTags'])->name('managetags')->middleware('is_admin');
