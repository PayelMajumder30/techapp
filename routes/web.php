<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContentController;

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

// Admin
Route::prefix('admin')->group(function() {
    require 'custom/admin.php';
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/status/{id}',[CareerController::class, 'PostStatus'])->name('post.status');
Route::name('front.')->group(function() {
    Route::prefix('career')->name('career.')->group(function(){
        Route::get('/',[ContentController::class, 'career'])->name('index');
    });
});
