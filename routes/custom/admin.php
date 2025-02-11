<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,IndexController,CareerController};

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::match(['get', 'post'],'/admission-form', [IndexController::class, 'formView'])->name('admission.index');

Route::prefix('career')->middleware(['auth'])->group(function () {
    Route::get('post/create', [CareerController::class, 'createPost'])->name('career.create');
    Route::post('post/create', [CareerController::class, 'storePost'])->name('career.store');
    Route::get('index', [CareerController::class, 'postList'])->name('career.index');
    Route::get('post/edit/{id}',[CareerController::class, 'editPost'])->name('career.edit');
    Route::post('post/edit/{id}',[CareerController::class, 'updatePost'])->name('career.update');
    Route::delete('delete/{id}',[CareerController::class, 'destroyPost'])->name('career.delete');
    Route::post('post/change-status',[CareerController::class, 'changePostStatus'])->name('career.change-status');

});

?>
