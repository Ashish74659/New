<?php

use App\Http\Controllers\Admin\{
    ItemController,  
    ModifierController,
};
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'item', 'middleware' => ['auth', 'preventBackHistory']], function () { 
    Route::get('/item-list',[ItemController::class, 'index'])->name('item-list');
    Route::get('/item-add', [ItemController::class, 'add'])->name('item-add');
    Route::get('/item-edit', [ItemController::class, 'add'])->name('item-edit');
    Route::post('/item-store', [ItemController::class, 'store'])->name('item-store');
    Route::get('/item-warehouse-to-company', [ItemController::class, 'warehouse_to_company'])->name('item-warehouse-to-company');
    Route::post('/company-item-delete', [ItemController::class, 'delete'])->name('company-item-delete');
});

Route::group(['prefix' => 'modifier', 'middleware' => ['auth', 'preventBackHistory']], function () {
    Route::get('/modifier-list',[ModifierController::class, 'index'])->name('modifier-list');
    Route::get('/modifier-add', [ModifierController::class, 'add'])->name('modifier-add');
    Route::get('/modifier-edit', [ModifierController::class, 'add'])->name('modifier-edit');
    Route::post('/modifier-store', [ModifierController::class, 'store'])->name('modifier-store'); 
});



  
 
  