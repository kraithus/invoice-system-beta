<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationIssuedController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureHasRole;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route that need user authentication before being accessed
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('job', JobController::class);
    Route::resource('notification', NotificationController::class);
    Route::resource('quotation', QuotationController::class);
    Route::resource('user', UserController::class);

    /**
     * Test routes
     * Naming scheme test-'testFeatureName'
     */
    Route::controller(TestController::class)->group(function () {
        Route::get('test-datatables', 'dataTables')->name('test-datatables');

        Route::get('test-quotation-email/{id}', 'sendQuotationMail')->name('test-quotation-email');
        
        Route::get('test-quotation-pdf/{id}', 'generateQuotationPDF')->name('test-quotation-pdf');

        Route::get('weekly-chart', 'chartTest')->name('weekly-chart');
    });
    /**
     * Quotation mailing and PDF generation
     */
    Route::controller(QuotationIssuedController::class)->group(function () {
        Route::get('email-quotation/{id}', 'sendQuotationMail')->name('email-quotation');
        
        Route::get('quotation-pdf/{id}', 'viewQuotationPDF')->name('quotation-pdf');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('/', 'index');
    });

    /**
     * Is Admin middleware
     */
        Route::middleware(['is.admin'])->group(function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('cpanel', 'index')->name('cpanel');
            });
        });
});

require __DIR__.'/auth.php';
