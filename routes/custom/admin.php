<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,IndexController,PostController,UnitController,SubjectController,
    JobController,JobvcController};

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::match(['get', 'post'],'/admission-form', [IndexController::class, 'formView'])->name('admission.index');

Route::prefix('career')->middleware(['auth'])->group(function () {

    //posts
    Route::prefix('post')->middleware(['auth'])->group(function (){
        Route::get('/create', [PostController::class, 'createPost'])->name('career.create');
        Route::post('/create', [PostController::class, 'storePost'])->name('career.store');
        Route::get('/index', [PostController::class, 'postList'])->name('career.index');
        Route::post('/change-status',[PostController::class, 'changePostStatus'])->name('post.change-status');
        Route::get('/edit/{id}',[PostController::class, 'editPost'])->name('career.edit');
        Route::post('/edit/{id}',[PostController::class, 'updatePost'])->name('career.update');
        Route::delete('/delete/{id}',[PostController::class, 'destroyPost'])->name('career.delete');
    });

    //units
    Route::prefix('unit')->middleware(['auth'])->group(function(){
        Route::get('/create', [UnitController::class, 'createUnit'])->name('unit.create');
        Route::post('/create', [UnitController::class, 'storeUnit'])->name('unit.store');
        Route::get('/index', [UnitController::class, 'unitList'])->name('unit.index');
        Route::post('/change-status',[UnitController::class, 'changeUnitStatus'])->name('unit.change-status');
        Route::get('/edit/{id}',[UnitController::class, 'editUnit'])->name('unit.edit');
        Route::post('/edit/{id}',[UnitController::class, 'updateUnit'])->name('unit.update');
        Route::delete('/delete/{id}',[UnitController::class, 'destroyUnit'])->name('unit.delete');
    });

    //subjects
    Route::prefix('subject')->middleware(['auth'])->group(function(){
      Route::get('/create', [SubjectController::class, 'createSubject'])->name('subject.create');
      Route::post('/create', [SubjectController::class, 'storeSubject'])->name('subject.store');
      Route::get('/index', [SubjectController::class, 'subjectList'])->name('subject.index');
      Route::post('/change-status', [SubjectController::class, 'changeSubStatus'])->name('subject.change-status');
      Route::get('/edit/{id}', [SubjectController::class, 'editSub'])->name('subject.edit');
      Route::post('/edit/{id}', [SubjectController::class, 'updateSub'])->name('subject.update');
      Route::delete('/delete/{id}', [SubjectController::class, 'destroySub'])->name('subject.delete');
    });

    //job categories
    Route::prefix('job_categories')->middleware(['auth'])->group(function(){
        Route::get('/create', [JobController::class, 'createJob'])->name('jobct.create');
        Route::post('/create', [JobController::class, 'storeJob'])->name('jobct.store');
        Route::get('/index', [JobController::class, 'jobList'])->name('jobct.index');
        Route::post('/change-status', [JobController::class, 'changeJobStatus'])->name('jobct.change-status');
        Route::get('/edit/{id}', [JobController::class, 'editJob'])->name('jobct.edit');
        Route::post('edit/{id}', [JobController::class, 'updateJob'])->name('jobct.update');
        Route::delete('/delete/{id}', [JobController::class, 'desrtroyJob'])->name('jobct.delete');
    });

    //job vacancies
    Route::prefix('job_vacancies')->middleware(['auth'])->group(function(){
        Route::get('/create', [JobvcController::class, 'createJobvc'])->name('jobvc.create');
        Route::post('/create', [JobvcController::class, 'storeJobvc'])->name('jobvc.store');
        Route::get('/index', [JobvcController::class, 'vacancyList'])->name('jobvc.index');
        Route::post('/change-status', [JobvcController::class, 'changeVcStatus'])->name('jobvc.change-status');
        Route::get('update/{id}', [JobvcController::class, 'editJob'])->name('jobvc.edit');
        Route::post('update/{id}', [JobvcController::class, 'updateJob'])->name('jobvc.update');
        Route::delete('/delete/{id}', [JobvcController::class, 'desrtroyJob'])->name('jobvc.delete');
    });
});

?>
