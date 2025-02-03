<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    EmailController
}; 
 

Route::group(['prefix' => 'email', 'middleware' => ['auth', 'preventBackHistory']], function () {

    // -----These route for the Customer of admin and auth. This code created by Lal Singh-----------------------
    Route::get('/template-list', [EmailController::class, 'index'])->name('email-template-list');
    Route::get('/template-add', [EmailController::class, 'add'])->name('email-template-add');
    Route::post('template-store', [EmailController::class, 'store'])->name('email-template-store');
    Route::post('get-email-master', [EmailController::class, 'get_email_master'])->name('get-email-master'); 
    Route::get('get-all-email-template', [EmailController::class, 'get_all_email_template'])->name('get-all-email-template'); 
});
