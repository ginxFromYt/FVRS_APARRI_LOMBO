<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\CTRLFeedbacks;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LocalReportController;
use App\Http\Controllers\RecordViolationController;
use App\Http\Controllers\TurnoverReceiptController;
use App\Http\Controllers\ResolvedController;
use App\Http\Controllers\CancelledController;
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


// admin routes here
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function () {
    // Add routes here for admin
    Route::resource('/users', UserController::class, ['except' => ['create', 'store', 'destroy']]);
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
   // Route for analytics dashboard

   Route::get('/analytics', [AnalyticsController::class, 'dashboard'])->name('analytics.dashboard');

    // Route for viewing user feedbacks
    Route::get('/userfeedbacks', [UserController::class, 'userfeedback'])->name('userfeedback');

    // Route for admin users report
    Route::get('/report', [UserController::class, 'usersReport'])->name('report');
    Route::get('/referrals', [UserController::class, 'viewReferrals'])->name('referrals');

    Route::get('/viewed_reports', [UserController::class, 'viewedReports'])->name('viewed_reports');

    // Route for logs
    Route::get('/logs', [UserController::class, 'showLogs'])->name('logs');

// Route to show the registration form
Route::get('register/create', [UserController::class, 'showRegisterForm'])->name('register');

// Route to handle the registration form submission
Route::post('register', [UserController::class, 'register'])->name('register.store');



Route::get('/violations/{id}/edits', [UserController::class, 'edits'])->name('violation.edits');

});


// users routes here
Route::namespace('App\Http\Controllers\Users')
    ->prefix('users')
    ->name('users.')
    ->middleware('can:user-access')
    ->group(function () {
        Route::get('/report', [CTRLFeedbacks::class, 'create'])->name('report');
        Route::post('/report', [CTRLFeedbacks::class, 'store'])->name('report.store');
        Route::get('/myreports', [CTRLFeedbacks::class, 'myreports'])->name('myreports');
        Route::put('/report/{id}/viewed', [CTRLFeedbacks::class, 'updateViewedStatus'])->name('report.viewed');
    });

// Route for creating and storing reports
Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
Route::get('/myreports', [ReportController::class, 'myreports'])->name('myreports');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::get('/users/myreports', [ReportController::class, 'myreports'])->name('users.myreports');
Route::get('/reports/addReferral/{id}', [ReportController::class, 'addReferral'])->name('addReferral');
Route::post('/reports/store-referral', [ReportController::class, 'storeReferral'])->name('storeReferral');
Route::get('/admin/referrals/{id}', [ReportController::class, 'getReferralDetails']);
Route::get('/user-reports', [ReportController::class, 'userReports'])->name('report.userreports');
Route::get('/report/{id}', [ReportController::class, 'showUserReport'])->name('report.view');




Route::get('/record-violation', [RecordViolationController::class, 'recordviolation'])->name('violation.record');
Route::post('/record-violation', [RecordViolationController::class, 'store'])->name('violation.store');
Route::get('/list-of-records', [RecordViolationController::class, 'listviolation'])->name('violation.list');
// Route::get('/record-violation/{id}/edit', [RecordViolationController::class, 'edit'])->name('violation.edit');
// Route::put('/record-violation/{id}', [RecordViolationController::class, 'update'])->name('violation.update');
// Display the edit form
Route::get('/violation/{id}/edit', [RecordViolationController::class, 'edit'])->name('violation.edit');
Route::get('/search-violators', [RecordViolationController::class, 'search'])->name('violation.search');
Route::post('/violation/finish/{id}', [RecordViolationController::class, 'finish'])->name('violation.finish'); // For marking as finished
Route::delete('/violation/{id}/delete', [RecordViolationController::class, 'destroy'])->name('violation.delete'); // For deleting a violation


// Update the violation
Route::put('/violation/{id}', [RecordViolationController::class, 'update'])->name('violation.update');

Route::get('/report', [LocalReportController::class, 'showReportForm'])->name('report.form');
Route::post('/report', [LocalReportController::class, 'store'])->name('report.store');



// Routes to view resolved and cancelled reports
Route::get('/reports/resolved', [LocalReportController::class, 'viewResolvedReports'])->name('resolvedReports');
Route::get('/reports/cancelled', [LocalReportController::class, 'viewCancelledReports'])->name('cancelledReports');

Route::get('/turnover-receipt/{id}', [ReportController::class, 'showTurnoverReceiptForm'])->name('turnoverReceiptForm');
Route::post('/submit-turnover-receipt', [ReportController::class, 'submitTurnoverReceipt'])->name('submitTurnoverReceipt');

Route::post('/display-turnover-receipt', [ReportController::class, 'showDisplayTurnoverReceipt'])->name('turnover.display');
Route::get('/turnover-receipt', [ReportController::class, 'showDisplayTurnoverReceipt'])->name('turnover.display');

Route::post('/turnover-receipt/store', [TurnoverReceiptController::class, 'store'])->name('turnover.store');
Route::get('/turnover-receipt', [TurnoverReceiptController::class, 'show'])->name('turnover.display');

Route::patch('/userreports/{id}/status/{status}', [LocalReportController::class, 'updateStatus'])->name('userreports.updateStatus');

Route::get('/history', [HistoryController::class, 'index'])->name('admin.history');

// Resolved routes
Route::get('/resolved', [ResolvedController::class, 'index'])->name('resolved.index');

// Cancelled routes
Route::get('/cancelled', [CancelledController::class, 'index'])->name('cancelled.index');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



// Authentication routes
require __DIR__.'/auth.php';
