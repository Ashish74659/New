<?php

use App\Http\Controllers\Admin\{
    CompanyController,  
};
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'company', 'middleware' => ['auth', 'preventBackHistory']], function () {

    // -----These route for the Company of admin and auth. This code created by Lal Singh-----------------------
    Route::get('/mark-as-read', [CompanyController::class, 'markRead'])->name('mark-as-read');
    Route::get('/view-all-notify', [CompanyController::class, 'viewNotifications'])->name('view-all-notify');
    Route::get('/company-list', [CompanyController::class, 'index'])->name('company-list');
    Route::any('/company-add', [CompanyController::class, 'add'])->name('company-add');
    // Route::any('/company-store', [CompanyController::class, 'store'])->name('company-store');
    Route::post('/company-setting-store', [CompanyController::class, 'setting_store'])->name('company-setting-store');
    Route::post('/company-contact-info-store', [CompanyController::class, 'contact_info_store'])->name('company-contact-info-store');
    Route::post('/company-business-localization', [CompanyController::class, 'business_localization'])->name('company-business-localization');    
    Route::get('/company-get-prefix-info', [CompanyController::class, 'get_prefix_info'])->name('company-get-prefix-info');    
    Route::get('/company-get-tile-info', [CompanyController::class, 'get_tile_info'])->name('company-get-tile-info');    
    
    Route::post('/company-prefix-store', [CompanyController::class, 'prefix_store'])->name('company-prefix-store');        
    Route::post('/company-tile-store', [CompanyController::class, 'tile_store'])->name('company-tile-store');        
    
    Route::post('/company-all-prefix-store', [CompanyController::class, 'all_prefix_store'])->name('company-all-prefix-store');        
    Route::post('/company-all-tile-store', [CompanyController::class, 'all_tile_store'])->name('company-all-tile-store');        
    Route::post('/company-logo-information', [CompanyController::class, 'logo_information'])->name('company-logo-information');        

    Route::get('/company-get-logo', [CompanyController::class, 'get_logo'])->name('company-get-logo');            
    Route::any('/company-edit', [CompanyController::class, 'add'])->name('company-edit');
    Route::any('/company-delete', [CompanyController::class, 'delete'])->name('company-delete');
  
    Route::get('/company-user-list', [Company_UsersController::class, 'index'])->name('comapny-users-list');
    Route::get('/company-user-add', [Company_UsersController::class, 'createCaompanyUser'])->name('comapny-user-add');
    Route::any('/company-user-store', [Company_UsersController::class, 'companyStore'])->name('comapny-user-store');
    Route::any('/company-user-edit/{id}', [Company_UsersController::class, 'editcompanyUser']);
    Route::any('/user-export-company', [Company_UsersController::class, 'exportCsv'])->name('comapny-user-export-master');
    Route::any('/update-company-user/{id}', [Company_UsersController::class, 'updateCompanyUser'])->name('comapny-user-update');
    Route::any('/show-company-user/{id}', [Company_UsersController::class, 'previewsComaonyUser'])->name('show-comapny-users');
 
});
