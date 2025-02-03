<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    CommonController,
    CommunicationController
};
use App\Http\Controllers\ReportGeneratorController;
use Illuminate\Validation\Rules\Can;

Route::group(['prefix' => 'common', 'middleware' => ['auth', 'preventBackHistory']], function () {

    Route::get('/get-seachable-itemData', [CommonController::class, 'getSearchableData'])->name('get-seachable-itemData');
    Route::get('/get-categories-subcategory', [CommonController::class, 'getCategoriesSubcategory'])->name('get-categories-subcategory');
    Route::get('/get-filterdItem-list', [CommonController::class, 'getFilterItemsList'])->name('get-filterdItem-listData');
 
});

Route::group(['prefix' => 'notice', 'middleware' => ['auth', 'preventBackHistory']], function () {
    Route::get('/notice-list', [CommunicationController::class, 'index'])->name('notice.list');
    Route::get('/notice-add', [CommunicationController::class, 'addnotice'])->name('notice.alert');
    Route::get('/notice-edit', [CommunicationController::class, 'edit'])->name('notice.alert.edit');
    Route::get('/notice-publish', [CommunicationController::class, 'publish'])->name('notice.publish');
    Route::post('/notice-store', [CommunicationController::class, 'store'])->name('notice-store');
    Route::get('/notice-view', [CommunicationController::class, 'viewNotice'])->name('notice.alert.view');



    Route::get('/auction-date-data', [CommunicationController::class, 'date_data'])->name('auction.date.data');
    Route::get('/gethe-subdate', [CommunicationController::class, 'getdate'])->name('gethe.subdate');
    Route::get('/gesendto-recordemployee', [CommunicationController::class, 'getemoloyee_or_vendor'])->name('get-recordemployee.vendor');
    Route::get('/update-record-tendersend', [CommunicationController::class, 'updatetenotification_status'])->name('update.record.tendersend');
    Route::get('/record-Yes_status', [CommunicationController::class, 'getonlyYes_status'])->name('record-Yes_status');
    Route::get('/notice.alert.log', [CommunicationController::class, 'viewLogs'])->name('notice.alert.log');




}); 