<?php

use App\Http\Controllers\Admin\{
    CustomerController,  
};
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'preventBackHistory']], function () { 
    Route::get('/customer-list', [CustomerController::class, 'index'])->name('customer-list');
    Route::get('/customer-add', [CustomerController::class, 'add'])->name('customer-add');
    Route::get('/customer-edit', [CustomerController::class, 'add'])->name('customer-edit');
    Route::post('/customer-store', [CustomerController::class, 'store'])->name('customer-store');         
    Route::get('/search-customer-by-value', [CustomerController::class, 'search_customer_by_value'])->name('search-customer-by-value');    
});
