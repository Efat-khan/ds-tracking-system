<?php

use App\Http\Controllers\FrontEndController\DailySummaryController;
use App\Http\Controllers\FrontEndController\DailySummaryDetailsController;
use App\Http\Controllers\FrontEndController\EmployeeCommunityController;
use App\Http\Controllers\FrontEndController\EmployeeDashboardController;
use App\Http\Controllers\FrontEndController\FileImportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/test', function () {
//     return view('frontEnd.dailySummary.index');
// })->name('test');


Route::prefix('employee')->middleware(['auth', 'verified'])->group(function(){
    // Employee Dashboard Routes
    Route::get('/dashboard', [EmployeeDashboardController::class,'index']
    )->name('dashboard');
    Route::post('/update-ds-work-status',[EmployeeDashboardController::class,'updateDsWorkStatus'])->name('employee.ds.work.status.update');
    Route::get('/update-ds-work-delete/{id}',[EmployeeDashboardController::class,'deleteDsWork'])->name('employee.ds.work.delete');
    // File import Routes
    Route::post('/import', [FileImportController::class, 'import'])->name('import');
    // Community Routes
    Route::get('/community', [EmployeeCommunityController::class,'index'])->name('employee.community');
    
    Route::get('/index', [DailySummaryController::class, 'index'])->name('employee.ds.index');
    Route::post('/add-daily-summary',[DailySummaryController::class,'store'])->name('employee.ds.store');
    Route::get('/work/index', [DailySummaryDetailsController::class, 'index'])->name('employee.ds.work.index');
    Route::post('/work/add-work',[DailySummaryDetailsController::class,'store'])->name('employee.ds.work.store');
    Route::get('/work/edit/{id}', [DailySummaryDetailsController::class, 'edit'])->name('employee.ds.work.edit');
    Route::post('/work/update/', [DailySummaryDetailsController::class, 'update'])->name('employee.ds.work.update');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
