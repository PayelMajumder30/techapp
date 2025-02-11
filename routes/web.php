<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{DashboardController,IndexController,JobController,CareerController};

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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::match(['get', 'post'],'/admission-form', [IndexController::class, 'formView'])->name('admission.index');


Route::get('career/post/create', [CareerController::class, 'createPost'])->name('career.create');
Route::post('career/post/create', [CareerController::class, 'storePost'])->name('career.store');
Route::get('career/index', [CareerController::class, 'postList'])->name('career.index');
Route::get('/career/post/edit/{id}',[CareerController::class, 'editPost'])->name('career.edit');
Route::post('/career/post/edit/{id}',[CareerController::class, 'updatePost'])->name('career.update');
Route::delete('/career/delete/{id}',[CareerController::class, 'destroyPost'])->name('career.delete');
// Route::get('/status/{id}',[CareerController::class, 'PostStatus'])->name('post.status');