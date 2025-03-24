<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\BackEndController\DashboardController;
use App\Http\Controllers\Admin\BackEndController\ReportController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');

    Route::post('login', [LoginController::class, 'store']);
});
Route::prefix('admin')->middleware(['auth:admin','verified'])->name('admin.')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/dashboard/filter',[DashboardController::class,'filterIndex'])->name('dashboard.search');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');

    // Daily Report Routes
    Route::get('/daily-report',[ReportController::class,'dailyReportIndex'])->name('dailyReport');
    Route::post('/daily-report/search',[ReportController::class,'dailyReportSearch'])->name('dailyReport.search');
    Route::get('/date-range-report',[ReportController::class,'dateRangeReportIndex'])->name('dateRangeReport');
    Route::post('/date-range-report/search',[ReportController::class,'dateRangeReportSearch'])->name('dateRangeReport.search');
    Route::post('/date-range-report/export/excel', [ReportController::class, 'dateRangeReportExportExcel'])->name('dateRangeReport.export.excel');

});
