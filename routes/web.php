<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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



Route::controller(FrontController::class)->name('front.')->group(function(){
    Route::get('/','reserve')->name('reserve');
    Route::post('/getslots', 'getSlots')->name('getslots');
    Route::post('/save','saveReservation')->name('save');
    Route::get('/account', 'account')->name('account');
    Route::post('/delete', 'delete')->name('delete');
});

Route::controller(AdminController::class)->name('admin.')->group(function(){
    Route::get('/admin',  'scheduler')->name('scheduler');
    Route::post('/admin/check','check')->name('checkslot');
    Route::post('/admin/create', 'create')->name('slotcreate');
});
