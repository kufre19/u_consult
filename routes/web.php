<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeOnboardingController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('logout', [LoginController::class, 'logout'])->name('logout'); 

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('app.login');
})->name("sign-in");

Route::get('/sign-in', function () {
    return view('app.login');
})->name("sign-in");


Route::get('/sign-up', function () {
    return view('app.signup');
})->name("sign-up");

Route::get('/stripe/delete-account', [StripeOnboardingController::class, 'deleteAccount'])
    ->name('stripe.delete-account');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/stripe/onboarding', [StripeOnboardingController::class, 'initiateOnboarding'])->name('stripe.onboarding');
    Route::get('/stripe/onboarding/complete', [StripeOnboardingController::class, 'completeOnboarding'])->name('stripe.onboarding.complete');
});

Route::middleware(['auth', 'verified', 'stripe.onboarding'])->prefix("dashboard")->group(function () {



    Route::get('/', function () {
        return view('app.dashboard');
    })->name("dashboard");


    // Route::get('/complete-onboarding ', function () {
    //     return view('app.complete-registration');
    // });
    Route::get('/invoices', [DashboardDataController::class, 'invoicesList'])->name('invoices.list');
    Route::get('/transactions', [DashboardDataController::class, 'transactionsList'])->name('transactions.list');
    Route::get('/clients', [DashboardDataController::class, 'clientList'])->name('clients.list');
    Route::get('/get-clients', [DashboardDataController::class, 'getClients'])->name('get.clients');
    Route::get('/get-invoices', [DashboardDataController::class, 'getInvoices'])->name('get.invoices');

    Route::get('/stripe/customers', [StripeController::class, 'getCustomers']);
    Route::post('/stripe/create-customer', [StripeController::class, 'createCustomer']);
    Route::post('/stripe/create-invoice', [StripeController::class, 'createInvoice']);
    Route::get('/get-transactions', [DashboardDataController::class, 'getTransactions'])->name('get.transactions');
});
