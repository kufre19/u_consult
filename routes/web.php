<?php

use App\Http\Controllers\Auth\LoginController;
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

    Route::get('/transaction/list ', function () {
        return view('app.transaction-list');
    })->name("transaction.list");

    Route::get('/invoice/list', function () {
        return view('app.invoices');
    })->name("invoice.list");
});
