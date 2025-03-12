<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController,IndexController,PostController,UnitController,SubjectController,
    JobController,JobvcController, DepartmentController, FacultyController, SeoController, ContentAController,
    LeadController, SocialMediaController};

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth:admin'])->name('dashboard');
Route::match(['get', 'post'],'/admission-form', [IndexController::class, 'formView'])->name('admission.index');

Route::prefix('career')->middleware(['auth:admin'])->group(function () {

    //posts
    Route::prefix('post')->middleware(['auth:admin'])->group(function (){
        Route::get('/create', [PostController::class, 'createPost'])->name('career.create');
        Route::post('/create', [PostController::class, 'storePost'])->name('career.store');
        Route::get('/index', [PostController::class, 'postList'])->name('career.index');
        Route::post('/change-status',[PostController::class, 'changePostStatus'])->name('post.change-status');
        Route::get('/edit/{id}',[PostController::class, 'editPost'])->name('career.edit');
        Route::post('/edit/{id}',[PostController::class, 'updatePost'])->name('career.update');
        Route::delete('/delete/{id}',[PostController::class, 'destroyPost'])->name('career.delete');
    });

    //units
    Route::prefix('unit')->middleware(['auth:admin'])->group(function(){
        Route::get('/create', [UnitController::class, 'createUnit'])->name('unit.create');
        Route::post('/create', [UnitController::class, 'storeUnit'])->name('unit.store');
        Route::get('/index', [UnitController::class, 'unitList'])->name('unit.index');
        Route::post('/change-status',[UnitController::class, 'changeUnitStatus'])->name('unit.change-status');
        Route::get('/edit/{id}',[UnitController::class, 'editUnit'])->name('unit.edit');
        Route::post('/edit/{id}',[UnitController::class, 'updateUnit'])->name('unit.update');
        Route::delete('/delete/{id}',[UnitController::class, 'destroyUnit'])->name('unit.delete');
    });

    //subjects
    Route::prefix('subject')->middleware(['auth:admin'])->group(function(){
      Route::get('/create', [SubjectController::class, 'createSubject'])->name('subject.create');
      Route::post('/create', [SubjectController::class, 'storeSubject'])->name('subject.store');
      Route::get('/index', [SubjectController::class, 'subjectList'])->name('subject.index');
      Route::post('/change-status', [SubjectController::class, 'changeSubStatus'])->name('subject.change-status');
      Route::get('/edit/{id}', [SubjectController::class, 'editSub'])->name('subject.edit');
      Route::post('/edit/{id}', [SubjectController::class, 'updateSub'])->name('subject.update');
      Route::delete('/delete/{id}', [SubjectController::class, 'destroySub'])->name('subject.delete');
    });

    //job categories
    Route::prefix('job_categories')->middleware(['auth:admin'])->group(function(){
        Route::get('/create', [JobController::class, 'createJob'])->name('jobct.create');
        Route::post('/create', [JobController::class, 'storeJob'])->name('jobct.store');
        Route::get('/index', [JobController::class, 'jobList'])->name('jobct.index');
        Route::post('/change-status', [JobController::class, 'changeJobStatus'])->name('jobct.change-status');
        Route::get('/edit/{id}', [JobController::class, 'editJob'])->name('jobct.edit');
        Route::post('edit/{id}', [JobController::class, 'updateJob'])->name('jobct.update');
        Route::delete('/delete/{id}', [JobController::class, 'desrtroyJob'])->name('jobct.delete');
    });

    //job vacancies
    Route::prefix('job_vacancies')->middleware(['auth:admin'])->group(function(){
        Route::get('/create', [JobvcController::class, 'createJobvc'])->name('jobvc.create');
        Route::post('/create', [JobvcController::class, 'storeJobvc'])->name('jobvc.store');
        Route::get('/index', [JobvcController::class, 'vacancyList'])->name('jobvc.index');
        Route::post('/change-status', [JobvcController::class, 'changeVcStatus'])->name('jobvc.change-status');
        Route::get('update/{id}', [JobvcController::class, 'editJob'])->name('jobvc.edit');
        Route::post('update/{id}', [JobvcController::class, 'updateJob'])->name('jobvc.update');
        Route::delete('/delete/{id}', [JobvcController::class, 'desrtroyJob'])->name('jobvc.delete');
    });

    // job application
    Route::prefix('job_applications')->middleware(['auth:admin'])->group(function(){
        Route::get('/', [JobvcController::class, 'UserApplication'])->name('job_application.index');
        Route::get('/view/{id}',[JobvcController::class, 'UserApplicationView'])->name('job_application.view');
    });


});

Route::prefix('master_module')->middleware(['auth:admin'])->group(function(){
    Route::prefix('class')->middleware(['auth:admin'])->group(function() {
        Route::get('/index', [DepartmentController::class, 'classList'])->name('class.index');
        Route::get('/create', [DepartmentController::class, 'createClass'])->name('class.create');
        Route::post('/create', [DepartmentController::class, 'storeClass'])->name('class.store');
        Route::post('/change-status', [DepartmentController::class, 'classStatus'])->name('class.change-status');
        Route::get('update/{id}', [DepartmentController::class, 'editClass'])->name('class.edit');
        Route::post('update/{id}', [DepartmentController::class, 'updateClass'])->name('class.update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'destroyClass'])->name('class.delete');
    });
    Route::prefix('facilities')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [DepartmentController::class, 'facilityList'])->name('facilities.index');
        Route::get('/create', [DepartmentController::class, 'createFacility'])->name('facilities.create');
        Route::post('/create', [DepartmentController::class, 'storeFacility'])->name('facilities.store');
        Route::get('update/{id}',[DepartmentController::class, 'editFacility'])->name('facilities.edit');
        Route::post('update/{id}',[DepartmentController::class, 'updateFacility'])->name('facilities.update');
        Route::get('/status/{id}', [DepartmentController::class, 'facilityStatus'])->name('facilities.status');
        Route::delete('delete/{id}', [DepartmentController::class, 'destroyFacility'])->name('facilities.delete');
        Route::get('/view/{id}', [DepartmentController::class, 'FacilityView'])->name('facilities.view');
    });

    Route::prefix('sub_facilities')->middleware(['auth:admin'])->group(function(){
        //Route::get('/subfacilitylist/{id}',[DepartmentController::class, 'subfacilityList'])->name('sub_facilities.list');
        Route::get('/create/{id}', [DepartmentController::class, 'subfacilityCreate'])->name('sub_facilities.create');
        Route::post('/store', [DepartmentController::class, 'SubfacilityStore'])->name('sub_facilities.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'SubfacilityEdit'])->name('sub_facilities.edit');
        Route::post('/update', [DepartmentController::class, 'SubfacilityUpdate'])->name('sub_facilities.update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'SubfacilityDelete'])->name('sub_facilities.delete');
        Route::get('/status/{id}', [DepartmentController::class, 'SubfacilityStatus'])->name('sub_facilities.status');
    });
    Route::prefix('extra_curricular')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [FacultyController::class, 'curricularList'])->name('extraCurricular.index');
        Route::get('/create', [FacultyController::class, 'createCurricular'])->name('extraCurricular.create');
        Route::post('/create', [FacultyController::class, 'storeCurricular'])->name('extraCurricular.store');
        Route::get('update/{id}',[FacultyController::class, 'editCurricular'])->name('extraCurricular.edit');
        Route::post('update/{id}',[FacultyController::class, 'updateCurricular'])->name('extraCurricular.update');
        Route::delete('delete/{id}', [FacultyController::class, 'destroyCurricular'])->name('extraCurricular.delete');
    });

    //Teaching process
    Route::prefix('teaching_process')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [DepartmentController::class, 'TeachingList'])->name('teaching_process.index');
        Route::get('/create', [DepartmentController::class, 'TeachingCreate'])->name('teaching_process.create');
        Route::post('/store', [DepartmentController::class, 'TeachingStore'])->name('teaching_process.store');
        Route::get('/status/{id}', [DepartmentController::class, 'TeachingStatus'])->name('teaching_process.status');
        Route::delete('/delete/{id}', [DepartmentController::class, 'TeachingDelete'])->name('teaching_process.delete');
        Route::get('/edit/{id}', [DepartmentController::class, 'TeachingEdit'])->name('teaching_process.edit');
        Route::post('/update', [DepartmentController::class, 'TeachingUpdate'])->name('teaching_process.update');
    });

    Route::prefix('seo')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [SeoController::class, 'index'])->name('seo.index');
        Route::get('/detail/{id}', [SeoController::class, 'detail'])->name('seo.detail');
        Route::get('/edit/{id}', [SeoController::class, 'edit'])->name('seo.edit');
        Route::post('/update', [SeoController::class, 'update'])->name('seo.update');
    });

    //Why Choose Us

    Route::prefix('why_choose_us')->middleware(['auth:admin'])->group(function(){
        Route::get('/', [DepartmentController::class, 'ChooseUsIndex'])->name('choose_us.index');
        Route::get('/status/{id}', [DepartmentController::class, 'ChooseUsStatus'])->name('choose_us.status');
        Route::get('/create',[DepartmentController::class, 'ChooseUsCreate'])->name('choose_us.create');
        Route::post('/store', [DepartmentController::class, 'ChooseUsStore'])->name('choose_us.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'ChooseUsEdit'])->name('choose_us.edit');
        Route::post('/update', [DepartmentController::class, 'ChooseUsUpdate'])->name('choose_us.update');
        Route::delete('/delete/{id}', [DepartmentController::class, 'ChooseUsDelete'])->name('choose_us.delete');
    });

    //Galleries
    Route::prefix('galleries')->middleware(['auth:admin'])->group(function(){
        Route::get('/', [FacultyController::class, 'GalleryIndex'])->name('galleries.index');
        Route::get('/create', [FacultyController::class, 'GalleryCreate'])->name('galleries.create');
        Route::post('/store', [FacultyController::class, 'GalleryStore'])->name('galleries.store');
        Route::get('/edit/{id}', [FacultyController::class, 'GalleryEdit'])->name('galleries.edit');
        Route::post('/update', [FacultyController::class, 'GalleryUpdate'])->name('galleries.update');
        Route::delete('/delete/{id}', [FacultyController::class, 'GalleryDelete'])->name('galleries.delete');
    });

    //Faculties
    Route::prefix('faculty')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [FacultyController::class, 'FacultyIndex'])->name('faculty.index');
        Route::get('/create', [FacultyController::class, 'FacultyCreate'])->name('faculty.create');
        Route::post('/store', [FacultyController::class, 'FacultyStore'])->name('faculty.store');
        Route::delete('/delete/{id}', [FacultyController::class, 'FacultyDelete'])->name('faculty.delete');
        Route::get('/status/{id}', [FacultyController::class, 'FacultyStatus'])->name('faculty.status');
        Route::get('/edit/{id}', [FacultyController::class, 'FacultyEdit'])->name('faculty.edit');
        Route::post('/update', [FacultyController::class, 'FacultyUpdate'])->name('faculty.update');
    });

    //Lead
    Route::prefix('lead')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [LeadController::class, 'index'])->name('lead.index');
        Route::get('/export', [LeadController::class, 'export'])->name('lead.export');
        Route::get('/exportpdf',[LeadController::class, 'pdf'])->name('lead.pdf');
    });

    //social media
    Route::prefix('social-media')->middleware(['auth:admin'])->group(function(){
        Route::get('/index', [SocialMediaController::class, 'index'])->name('social.index');
        Route::get('/create', [SocialMediaController::class, 'create'])->name('social.create');
        Route::post('/store', [SocialMediaController::class, 'store'])->name('social.store');
        Route::delete('/delete/{id}', [SocialMediaController::class, 'delete'])->name('social.delete');
        Route::get('/edit/{id}', [SocialMediaController::class, 'edit'])->name('social.edit');
        Route::post('/update', [SocialMediaController::class, 'update'])->name('social.update');
    });

});
   //settings
   Route::prefix('settings')->middleware(['auth:admin'])->group(function(){
    Route::get('/',[ContentAController::class, 'settings'])->name('settings');
    Route::post('/update',[ContentAController::class, 'settingsUpdate'])->name('settings.update');
});

?>
