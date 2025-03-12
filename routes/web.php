<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\{ContentController,IndexeController,userAuthController, HomeController};

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

Route::get('/userregister',[userAuthController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/userregister',[userAuthController::class, 'register']);
Route::get('/userlogin', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/userlogin', [UserAuthController::class, 'login']);
Route::post('/userlogout', [UserAuthController::class, 'logout'])->name('user.logout');



// Only authenticated & verified users can access the home page
Route::get('/home', [IndexeController::class, 'home'])->middleware(['auth', 'verified'])->name('home.index');

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
//Route::get('/home', [IndexeController::class, 'home'])->name('home.index');
Route::get('/faculties', [IndexeController::class, 'faculty'])->name('faculties.index');
  //contact
Route::prefix('contact')->name('contact.')->group(function(){
    Route::get('/',[ContentController::class,'contact'])->name('index');
    Route::post('/enquiry',[ContentController::class,'contactEnquiry'])->name('enquiry');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/school', [SchoolController::class, 'index'])->name('school');
// });
// Route::controller(LoginRegisterController::class)->group(function() {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });



