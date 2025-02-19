<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserReportController;
use App\Http\Controllers\Users\ReportController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\LocalReportController;
use App\Http\Controllers\Admin\RecordViolationController;
use App\Http\Controllers\Users\TurnoverReceiptController;
use App\Models\RecordViolation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// route for the landing page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// redirects to specific dashboard based on the role of the user
Route::get('/dashboard', function () {
    if (Auth::user()->roles[0]->name == "admin") {
        return redirect()->route('admin.analytics.dashboard');

    } else {
        return view('users.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::resource('/users', UserController::class, ['except' => ['create', 'store', 'destroy']]);
   });

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::get('/violations/{id}/edits', [UserController::class, 'edits'])->name('violation.edits');
    Route::put('/violation/{id}', [RecordViolationController::class, 'update'])->name('violation.update');

});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
     Route::get('register/create', [UserController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [UserController::class, 'register'])->name('register.store');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::get('/receipt/{id}/pdf', [UserController::class, 'generateReceiptPDF'])->name('receiptpdf');
    Route::get('/turnover-receipts', [UserController::class, 'viewturnoverreceipts'])->name('turnoverreceipts');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::get('/report', [UserController::class, 'usersReport'])->name('report');
    Route::get('/spot-report/{id}', [UserController::class, 'generateReportsPDF'])->name('spotpdf');
    Route::get('/release/{id}', [UserController::class, 'release'])->name('release');
    Route::put('/release/{id}', [UserController::class, 'storeRelease'])->name('admin.release');
    // Route::post('/admin/release-pdf/{id}', [UserController::class, 'generateReleasePdf'])->name('admin.releasepdf');
    Route::get('/release/{id}/pdf', [UserController::class, 'downloadReleasePdf'])->name('release.pdf');



});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::get('/referrals', [UserController::class, 'viewReferrals'])->name('referrals');
    Route::get('/referral-report/{id}', [UserController::class, 'generateReferralPDF'])->name('referralpdf');
});
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    Route::get('/analytics', [AnalyticsController::class, 'dashboard'])->name('analytics.dashboard');
});

Route::get('/violations/month/{month}', function($month) {
    // Fetch violations for the given month
    $violations = RecordViolation::whereMonth('date_of_violation', $month)->get(['violation', 'location', 'date_of_violation']);
    return response()->json($violations);
});

Route::get('/violations/year/{year}', function($year) {
    // Fetch violations for the given year
    $violations = RecordViolation::whereYear('date_of_violation', $year)->get(['violation', 'location', 'date_of_violation']);
    return response()->json($violations);
});

Route::namespace('App\Http\Controllers\Admin')->middleware('can:admin-access')->group(function () {
    Route::get('/record-violation', [RecordViolationController::class, 'recordviolation'])->name('violation.record');
    Route::post('/record-violation', [RecordViolationController::class, 'store'])->name('violation.store');
    Route::post('/store-manually-inputted-violators', [RecordViolationController::class, 'storeManuallyInputtedViolators'])->name('violation.storeManuallyInputtedViolators');

    Route::get('/record-violation', [RecordViolationController::class, 'recordviolation'])->name('violation.record');
    Route::post('/record-violation', [RecordViolationController::class, 'store'])->name('violation.store');
    Route::get('/record-violation/{id}/edit', [RecordViolationController::class, 'edit'])->name('record-violation.edit');
    Route::get('/list-of-records', [RecordViolationController::class, 'listviolation'])->name('violation.list');
    Route::get('/violation/{id}/edit', [RecordViolationController::class, 'edit'])->name('violation.edit');
    Route::put('/record-violation/{id}', [RecordViolationController::class, 'update'])->name('violation.update');
    Route::get('/search-violators', [RecordViolationController::class, 'search'])->name('violation.search');
});


Route::namespace('App\Http\Controllers\Users')->prefix('users')->name('users.')->middleware('can:user-access')->group(function () {
    Route::get('/report', [UserReportController::class, 'create'])->name('report');
    Route::post('/report', [UserReportController::class, 'store'])->name('report.store');
    Route::get('/myreports', [UserReportController::class, 'myreports'])->name('myreports');
});


Route::namespace('App\Http\Controllers\Users')->middleware('can:user-access')->group(function () {
    Route::post('/turnover-receipt/store', [TurnoverReceiptController::class, 'store'])->name('turnover.store');
    Route::get('/turnover-receipt', [TurnoverReceiptController::class, 'show'])->name('turnover.display');
});


Route::namespace('App\Http\Controllers\Users')->middleware('can:user-access')->group(function () {
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/myreports', [ReportController::class, 'myreports'])->name('myreports');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('/users/myreports', [ReportController::class, 'myreports'])->name('users.myreports');
    Route::get('/reports/addReferral/{id}', [ReportController::class, 'addReferral'])->name('addReferral');
    Route::post('/reports/store-referral', [ReportController::class, 'storeReferral'])->name('storeReferral');
    Route::get('/user-reports', [ReportController::class, 'userReports'])->name('report.userreports');
    Route::get('/report/{id}', [ReportController::class, 'showUserReport'])->name('report.view');

    Route::get('/users/releases', [ReportController::class, 'releases'])->name('users.releases');
    Route::get('/releasepapers-pdf/{id}', [ReportController::class, 'generatePdf'])->name('releasepapers.pdf');

});

Route::namespace('App\Http\Controllers\Admin')->middleware('can:admin-access')->group(function () {
    Route::get('/history', [HistoryController::class, 'index'])->name('admin.history');
    Route::post('/violation/finish/{id}', [RecordViolationController::class, 'finish'])->name('violation.finish');
    Route::get('/admin/history/download-pdf', [HistoryController::class, 'downloadHistoryPdf'])->name('history.download-pdf');
});


Route::namespace('App\Http\Controllers\Admin')->middleware('can:admin-access')->group(function () {
   Route::get('/violation.barangays', [RecordViolationController::class, 'showBarangaysWithViolations'])->name('violation.barangays');
   // Route for fetching violators based on barangay address
Route::get('/violators/{barangay}', [RecordViolationController::class, 'getViolatorsByBarangay']);
// web.php
Route::get('/violations/summary', [RecordViolationController::class, 'summary'])->name('violation.summary');




});

Route::namespace('App\Http\Controllers\Users')->middleware('can:user-access')->group(function () {
    Route::get('/turnover-receipt/{id}', [ReportController::class, 'showTurnoverReceiptForm'])->name('turnoverReceiptForm');
    Route::post('/submit-turnover-receipt', [ReportController::class, 'submitTurnoverReceipt'])->name('submitTurnoverReceipt');
});




// Define route for ReportController
Route::post('/report/{id}/resolved', [ReportController::class, 'resolved'])->name('report.resolved');
Route::post('report/{id}/cancelled', [ReportController::class, 'cancelled'])->name('report.cancelled');
Route::get('/cancelled-reports', [ReportController::class, 'showcancelled'])->name('cancelled.reports');
Route::get('/resolved-reports', [ReportController::class, 'showresolved'])->name('resolved.reports');

Route::get('/report', [LocalReportController::class, 'showReportForm'])->name('report.form');
Route::post('/report', [LocalReportController::class, 'store'])->name('report.store');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



// Authentication routes
require __DIR__.'/auth.php';
