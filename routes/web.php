<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\{ContentController,IndexeController};
use App\Http\Controllers\AuthUser\{LoginController, RegisterController};

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

// Auth::routes();
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Admin
Route::prefix('admin')->group(function() {
    require 'custom/admin.php';
});
//Password reset
// Route::post('/forgot-password', function(Request $request){
//     $request->validate(['email'=>'required|email']);
//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status = Password::ResetLinkSent
//         ? back()->with(['status' => __($status)])
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');

// Route::get('reset-password/{token}', function (string $token){
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');
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
    // Route::prefix('contact')->name('contact')->group(function(){
    //     Route::get('/',[ContentController::class,'contact'])->name('contact.index');
    //     Route::post('/enquiry',[ContentController::class,'contactEnquiry'])->name('contact.enquiry');
    // });
});
Route::middleware(['auth'])->group(function (){
    Route::get('/extra-curricular',[IndexeController::class,'extra_curricular'])->name('extra_curricular.index');
    Route::get('/teaching-process',[IndexeController::class, 'teachingProcess'])->name('teachingprocess.index');
    Route::get('/home', [IndexeController::class, 'home'])->name('home.index');
    Route::get('/faculties', [IndexeController::class, 'faculty'])->name('faculties.index');
    //contact
    Route::prefix('contact')->name('contact.')->group(function(){
        Route::get('/',[ContentController::class,'contact'])->name('index');
        Route::post('/enquiry',[ContentController::class,'contactEnquiry'])->name('enquiry');
    });
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



