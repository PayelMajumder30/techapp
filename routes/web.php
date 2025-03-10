<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\IndexeController;

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
        Route::get('/confirmation', [ContentController::class, 'confirmation'])->name('confirmation');
        Route::get('/{slug}', [ContentController::class, 'CareerApplicationForm'])->name('application.form');
        Route::post('/register/application/submit', [ContentController::class, 'RegisterFinalSubmit'])->name('application.form.submit');
    });

    //contact
    Route::prefix('contact')->name('contact')->group(function(){
        Route::get('/',[ContentController::class,'contact'])->name('contact.index');
        Route::post('/enquiry',[ContentController::class,'contactEnquiry'])->name('contact.enquiry');
    });
});
Route::get('/extra-curricular',[IndexeController::class,'extra_curricular'])->name('extra_curricular.index');
Route::get('/teaching-process',[IndexeController::class, 'teachingProcess'])->name('teachingprocess.index');
Route::get('/home', [IndexeController::class, 'home'])->name('home.index');
Route::get('/faculties', [IndexeController::class, 'faculty'])->name('faculties.index');
  //contact
Route::prefix('contact')->name('contact.')->group(function(){
    Route::get('/',[ContentController::class,'contact'])->name('index');
    Route::post('/enquiry',[ContentController::class,'contactEnquiry'])->name('enquiry');
});




