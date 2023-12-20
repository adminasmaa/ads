<?php

use App\Http\Controllers\Ads\AdsController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\PartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\hr\EmployeeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\EmployeePermission;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', [FrontController::class, 'index'])->name('front.index');

    Route::middleware('auth:web')->group(function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

        Route::middleware([EmployeePermission::class])->group(function () {
            ///////////////////////////////////////setting  routes/////////////////////////////////
            Route::get('employees/setting', function () {
                return view('pages.setting.index');
            })->name('setting');

            Route::group(['prefix' => 'employees/setting'], function () {
                Route::Resource('qualifications', QualificationController::class);
                Route::Resource('jobTitles', JobTitleController::class);
                Route::Resource('employeestatuses', EmployeeStatusController::class);
                Route::Resource('professions', ProfessionController::class)->except('show');
                //Set_Role_permissions
                Route::get('professions/ShowRoles/{id?}', [MakepermissionController::class, 'index'])->name('ShowRoles');
                Route::get('professions/StoreRolesPermission/{id?}', [MakepermissionController::class, 'StorePermission'])->name('StoreRolesPermission');
                Route::Resource('nationalities', NationalityController::class);
                Route::Resource('banks', BankController::class);
                //roles

            });
            Route::Resource('branches', BranchController::class);
            Route::resource('roles', RolesController::class);
            ///////////////////////////////////////end setting  routes/////////////////////////////////
            Route::group(['prefix' => 'subscriptions'], function () {

                Route::Resource('services', ServicesController::class);
                // Route::get('galleries/{id?}', [GalleriesController::class, 'index'])->name('galleries.index');
                Route::Resource('galleries', GalleriesController::class);
            });

            /// end clients routes

            ////////////////employee routes////////////////////////////////////////
            Route::Resource('employees', EmployeeController::class)->except('show');
            Route::get('employees/profile/{id?}', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::group(['prefix' => 'employees'], function () {
                Route::get('reports/{id?}', [ReportController::class, 'index'])->name('reports.index');
                Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
                Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
                //////////////////////////////// start of EmployeeNotes  ////////////////////////////////////

                Route::resource('EmployeeNotes', EmployeeNotesController::class)->except('show');
                Route::get('EmployeeNotes/show/{branch?}', [EmployeeNotesController::class, 'show'])->name('EmployeeNotes.show');
                Route::post('EmployeeNotes/restore/{id}', [EmployeeNotesController::class, 'restore'])->name('EmployeeNotes.restore');

                ////////////////////////////////////////////////AwardDiscount/////////////
                Route::resource('awardDiscounts', AwardDiscountController::class)->except('show');
                Route::get('awardDiscounts/show/{awardDiscount}', [AwardDiscountController::class, 'show'])->name('awardDiscounts.show');
                Route::post('awardDiscounts/status/{awardDiscount}', [AwardDiscountController::class, 'changeStatus'])->name('awardDiscounts.changeStatus');
            });

        });
        Route::Resource('ads', AdsController::class)->except('show');
        Route::get('ads/visitors', [AdsController::class, 'visitors'])->name('ads.visitors');
        Route::get('ads/visitors_all', [AdsController::class, 'visitors_all'])->name('ads.visitors_all');

        Route::get('ads/stat/{id?}', [AdsController::class, 'stat'])->name('ads.stat');
        Route::get('ads/stat_all/{id?}', [AdsController::class, 'stat_all'])->name('ads.stat_all');
        Route::get('ads/stat_all_details/{date?}/{id2?}/{id?}', [AdsController::class, 'stat_all_details'])->name('ads.stat_all_details');

        //////////////////////////////// start of EmployeeNotes  ////////////////////////////////////

        //////////////////////////////// end of EmployeeNotes  ////////////////////////////////////
        //routes for message and profile employee

        ////////////////////////bookings//////////////////
        Route::resource('subscriptions', SubscriptionsController::class)->except('show');
        Route::resource('partments', PartmentController::class);

    });

    ////////////////////////////front

    Route::get('/', [FrontController::class, 'index'])->name('front.index');
    Route::get('/front/calls', [FrontController::class, 'calls'])->name('front.calls');
    Route::get('/front/whats', [FrontController::class, 'whats'])->name('front.whats');
    Route::get('/front/insta', [FrontController::class, 'insta'])->name('front.insta');
    Route::get('/front/details', [FrontController::class, 'details'])->name('front.details');

    Route::get('/front/type', [FrontController::class, 'type'])->name('front.type');
    Route::get('/front/details/{subs?}/{adsType?}', [FrontController::class, 'detail'])->name('front.detail');
    // Route::view('/contact', 'contact');
    Route::get('/front', [FrontController::class, 'index'])->name('front.index');
    Route::get('/front/type', [FrontController::class, 'type'])->name('front.type');
    Route::get('/front/details/{apartment}', [FrontController::class, 'detail'])->name('front.detail');
    Route::get('/front/booking/{apartment}', [FrontController::class, 'booking'])->name('front.booking')->middleware('auth:client');
    Route::post('/front/booking/{apartment}', [FrontController::class, 'makebooking'])->name('front.booking');

    Route::post('/front/price/{apartment}', [FrontController::class, 'price'])->name('front.price');

});

require __DIR__ . '/auth.php';
