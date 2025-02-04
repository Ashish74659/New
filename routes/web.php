<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmailTrackingController;
// use App\Http\Controllers\TwoFactorAuthController;
// use App\Http\Controllers\AttachementController;
// use App\Http\Controllers\ActivityLogController;
// use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\{
    // APIController,
    DashboardController,
    NumbersequenceController,
    MasterController,
    PosController,
    CategoryController,
    ImportExportController,
    DocumentuploadController
};
use App\Http\Controllers\{
    WelcomeController,
    PermissionController,
    UsersController,
    RoleController,
    LanguageController,    
};

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
// Route::group(['prefix' => 'comments', 'middleware' => ['auth']], function(){
//     Route::get('list', [CommentController::class, 'list'])->name('comments-list');
//     Route::Post('store', [CommentController::class, 'store'])->name('comment-store');
// });


Route::group(['prefix' => 'category', 'middleware' => ['auth']], function(){
    Route::get('category-list', [CategoryController::class, 'cat_list'])->name('category-list');
    Route::get('category-add', [CategoryController::class, 'cat_add'])->name('category-add');
    Route::get('category-edit', [CategoryController::class, 'cat_add'])->name('category-edit');
    Route::post('category-store', [CategoryController::class, 'cat_store'])->name('category-store');
   
    Route::get('subcategory-list', [CategoryController::class, 'sub_cat_list'])->name('sub-category-list');
    Route::get('subcategory-add', [CategoryController::class, 'sub_cat_add'])->name('sub-category-add');
    Route::get('subcategory-edit', [CategoryController::class, 'sub_cat_add'])->name('sub-category-edit');
    Route::post('subcategory-store', [CategoryController::class, 'sub_cat_store'])->name('sub-category-store');

});


//Route::get('/',[WelcomeController::class, 'index'])->name('welcome'); 

// Route::middleware('auth')->group(function () {
//     Route::get('/2fa/setup', [TwoFactorAuthController::class, 'showSetupForm'])->name('2fa.setup');
//     Route::post('/2fa/setup', [TwoFactorAuthController::class, 'setup']);
//     Route::get('/2fa/verify', [TwoFactorAuthController::class, 'showVerifyForm'])->name('2fa.verify');
//     Route::post('/2fa/verify', [TwoFactorAuthController::class, 'verifyToken']);
//     Route::post('/2fa/enable',[TwoFactorAuthController::class,'two_fa_setup']);
//     Route::post('/2fa/resend',[TwoFactorAuthController::class,'reSendToken'])->name('2fa.resend');
// });

// Route::group(['attachement' => 'docs', 'middleware' => ['auth']], function(){
//     Route::post('attachement', [AttachementController::class, 'attachementUpload'])->name('attachement-upload');
//     Route::get('attachement-list', [AttachementController::class, 'attachementList'])->name('attachement-list');
//     Route::get('attachement-delete', [AttachementController::class, 'attachementDelete'])->name('attachement-delete');
//     Route::get('attachement-submit', [AttachementController::class, 'attachementSubmit'])->name('attachement-submit');
//     Route::get('attachement-submitlist', [AttachementController::class, 'attachementSubmitList'])->name('attachement-submitlist');
// });

// Route::group(['Activitylog' => 'logs', 'middleware' => ['auth']], function(){
//     Route::get('list', [ActivityLogController::class, 'list'])->name('activity-log-list');
//     Route::get('workflow-list', [ActivityLogController::class, 'workflowlist'])->name('workflow-log-list');
// });




// Route::get('email/track/{id}', [EmailTrackingController::class, 'track']);


Route::any('language-switch', [LanguageController::class, 'languageSwitch'])->name('language-switch');
//  Route::get('/route-cache', function() {
//       $exitCode = Artisan::call('view:clear');
//       $exitCode = Artisan::call('config:cache');
//       $exitCode = Artisan::call('cache:clear');
//      return 'View cache cleared';
//  });
//   Route::get('/config-cache', function() {
//      $exitCode = Artisan::call('config:cache');
//      return 'Config cache cleared';
//  });
Route::group(['prefix' => 'master-setting', 'middleware' => ['auth','preventBackHistory']], function(){
    Route::get('/setup', [DashboardController::class, 'masterSetting'])->name('setup');
});

Route::get('/emp-admin-profile', [DashboardController::class, 'emp_admin_profile'])->name('emp-admin-profile');


Route::group(['prefix' => 'pos', 'middleware' => ['auth','preventBackHistory']], function(){
    Route::get('/open-registration', [PosController::class, 'openreg'])->name('open-registration');
    Route::post('/close-registration', [PosController::class, 'closereg'])->name('close-registration');
    Route::post('/emp-start', [PosController::class, 'pos_start'])->name('pos-emp-start');
    Route::get('/emp-pos-order', [PosController::class, 'emp_pos_order'])->name('emp-pos-order');
    Route::get('/register-details', [PosController::class, 'pos_register_details'])->name('pos-register-details');    
    Route::get('/get-item-by-cat-subcat', [PosController::class, 'get_items_by_cat_subcat'])->name('get-item-by-cat-subcat');
    Route::get('/add-item-to-cart', [PosController::class, 'add_item_to_cart'])->name('add-item-to-cart');    
    Route::post('/save-order-by-emp', [PosController::class, 'save_order_by_emp'])->name('save-order-by-emp');
 
    Route::get('/order-detail', [PosController::class, 'order_detail'])->name('order-detail');    
    
    Route::get('/running-order', [PosController::class, 'runningorder'])->name('running-order');
    Route::get('/running-order-data', [PosController::class, 'runningorder_data'])->name('running-order-data');
    Route::get('/history-order-data', [PosController::class, 'historyorder_data'])->name('history-order-data');
    

    Route::get('/pos-payment-page', [PosController::class, 'pos_payment_page'])->name('pos-payment-page');
    
    Route::post('/complete-payment', [PosController::class, 'complete_payment'])->name('complete-payment');
    Route::get('/order-invoice-view', [PosController::class, 'order_invoice_view'])->name('order-invoice-view');
    
    
    

    

});
 
// Route::middleware(['auth'])->group(function () {
//     Route::get('/emp-admin-password-change', [DashboardController::class, 'emp_admin_change_password'])->name('emp-admin-password-change');
//     Route::post('/update-vendor-password', [DashboardController::class, 'update_vendor_password'])->name('update-vendor-password');
// });

// Route::post('/emp-profile-update', [DashboardController::class, 'updateProfilePhoto'])->name('emp-profile-update');
// Route::post('/change-Password', [DashboardController::class, 'changePassword'])->name('change-Password');

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'preventBackHistory']], function () {
    Route::get('/user-list', [UsersController::class, 'index'])->name('user-list');
    Route::get('/user-add', [UsersController::class, 'add'])->name('user-add');
    Route::post('/user-store', [UsersController::class, 'store'])->name('user-store');
    Route::get('/user-view', [UsersController::class, 'view'])->name('user-view');
    Route::get('/user-edit', [UsersController::class, 'add'])->name('user-edit');
    // Route::post('/user-update', [UsersController::class, 'update'])->name('user-update');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'preventBackHistory']], function () {
    Route::resource('roles', RoleController::class);
    Route::get('/create-role',[RoleController::class,'create'])->name('create-role');
    Route::get('/role-menusetting',[RoleController::class,'rolemenusetting'])->name('role-menusetting');
    Route::get('/edit-role-menu',[RoleController::class,'editMenu'])->name('edit-role-menu');
    Route::post('/update',[RoleController::class,'update'])->name('roles.update');
    Route::resource('permission', PermissionController::class);
});

Route::get('/system-admin', [DashboardController::class, 'systemadmin'])->name('systemadmin');
Route::any('/system-admin-store', [DashboardController::class, 'systemadminStore'])->name('systemadminStore');


// Route::group(['prefix' => 'activity-logs', 'middleware' => ['auth','preventBackHistory']], function(){
//     Route::get('/user-log','UsersController@UserLogIndex')->name('users.user-log');
//     Route::get('/user-log-list', 'UsersController@getuserLog')->name('users.user-log-list');
// });

// Route::group(['prefix' => 'api', 'middleware' => ['auth']], function(){
//     Route::any('/edit-api-details', [APIController::class, 'editAPI_Details'])->name('edit-api-details');
//     Route::any('/update-api-header', [APIController::class, 'updateAPI_Header'])->name('update-api-header');
//     Route::any('/add-api-line', [APIController::class, 'addAPI_Line'])->name('add-api-line');
//     Route::any('/edit-api-line', [APIController::class, 'editAPI_Line'])->name('edit-api-line');
//     Route::any('/update-api-line', [APIController::class, 'updateAPI_Line'])->name('update-api-line');

// });



Route::group(['prefix' => 'master', 'middleware' => ['auth']], function(){
    Route::any('/{model_name}-list', [MasterController::class, 'index']);
    Route::any('/{model_name}-add', [MasterController::class, 'add']);
    Route::any('/{model_name}-edit', [MasterController::class, 'edit']);
    Route::any('/{model_name}-update', [MasterController::class, 'update']);
    Route::any('/{model_name}-delete/{id}', [MasterController::class, 'delete']);

    Route::get('/get-children-by-parent', [MasterController::class, 'get_subcategory'])->name('get-children-by-parent');

    Route::any('/{parent}-{model_name}-lists', [MasterController::class, 'indexs']);
    Route::any('/{parent}-{model_name}-adds', [MasterController::class, 'adds']);
    Route::any('/{parent}-{model_name}-edits', [MasterController::class, 'edits']);
    Route::any('/{parent}-{model_name}-updates', [MasterController::class, 'updates']);
    Route::any('/{parent}-{model_name}-deletes', [MasterController::class, 'deletes']);
    Route::get('/find-doc-by-id', [MasterController::class, 'find_doc_by_id'])->name('find-doc-id');

    Route::get('/secure-documents', [MasterController::class, 'fileTest'])->name('secure-documents');
});

Route::group(['prefix' => 'setup', 'middleware' => ['auth']], function(){

    // Route::post('/document-upload', [DocumentuploadController::class, 'document_upload'])->name('vendor-tender-document-upload');
    // Route::get('/document-load', [DocumentuploadController::class, 'document_load'])->name('vendor-tender-document-load');
    // Route::post('/document-delete', [DocumentuploadController::class, 'document_delete'])->name('vendor-tender-document-delete');
    // Route::get('/zip-download', [DocumentuploadController::class, 'zip_download'])->name('tender-vendor-zip-download');

    Route::get('/document-view-page', [DocumentuploadController::class, 'document_view_page'])->name('document-view-page');
    Route::post('/document-upload-image', [DocumentuploadController::class, 'document_upload_image'])->name('document-upload-image');

});

Route::group(['prefix' => 'imp-exp', 'middleware' => ['auth','preventBackHistory']], function(){
    Route::get('/download-template', [ImportExportController::class, 'download_template'])->name('download-template');
    Route::post('/upload-item-master', [ImportExportController::class, 'upload_item_master'])->name('upload-item-master');         
});




Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','preventBackHistory']], function(){
    Route::group(['prefix' => 'employee-dashboard', 'middleware' => ['2fa', 'verified']], function(){
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    });
    // Route::group(['prefix' => 'vendor-dashboard', 'middleware' => ['2fa', 'verified']], function(){
    //     Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // });
});

Route::post('/switch-company', [MasterController::class, 'switch_company'])->name('switch-company');

require __DIR__.'/auth.php';
require __DIR__.'/email.php';
require __DIR__.'/company.php';
require __DIR__.'/common.php';
require __DIR__.'/customer.php'; 