<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrusteeController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FinancialAccountController;
use App\Http\Controllers\SevaController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PaymentVoucherController;
use App\Http\Controllers\ReceiptVoucherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Masters
    |--------------------------------------------------------------------------
    */

    Route::resource('users', UserController::class);

    Route::resource('trustees', TrusteeController::class);

    Route::resource('donors', DonorController::class);

    Route::resource('employees', EmployeeController::class);

    Route::resource('customers', CustomerController::class);

    Route::resource('halls', HallController::class);

    Route::resource('financial-accounts', FinancialAccountController::class);

    Route::resource('sevas', SevaController::class);
    Route::resource('receipt-vouchers', ReceiptVoucherController::class);

    /*
    |--------------------------------------------------------------------------
    | Bookings
    |--------------------------------------------------------------------------
    */

    Route::resource('bookings', BookingController::class);

    Route::get(
        '/api/halls/{hall}',
        [HallController::class, 'details']
    )->name('halls.details');

    Route::get(
        '/api/bookings/check-availability',
        [BookingController::class, 'checkAvailability']
    )->name('bookings.checkAvailability');

    /*
    |--------------------------------------------------------------------------
    | Donations
    |--------------------------------------------------------------------------
    */

    Route::resource('donations', DonationController::class);

    Route::get(
        '/donations/{donation}/receipt',
        [DonationController::class, 'receipt']
    )->name('donations.receipt');

    /*
    |--------------------------------------------------------------------------
    | Trust Settings
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/settings',
        [SettingController::class, 'edit']
    )->name('settings.edit');

    Route::put(
        '/settings',
        [SettingController::class, 'update']
    )->name('settings.update');



Route::resource('payment-vouchers', PaymentVoucherController::class);

Route::post(
    'payment-vouchers/{paymentVoucher}/approve',
    [PaymentVoucherController::class, 'approve']
)->name('payment-vouchers.approve');

Route::get(
    'payment-vouchers/{paymentVoucher}/pdf',
    [PaymentVoucherController::class, 'pdf']
)->name('payment-vouchers.pdf');


    Route::get(
    '/donations/{donation}/receipt',
    [DonationController::class, 'receipt']
)->name('donations.receipt');
Route::resource('account-heads', App\Http\Controllers\AccountHeadController::class);
});

Route::get(
    '/ledger',
    [App\Http\Controllers\LedgerController::class, 'index']
)->name('ledger.index');
Route::view('/', 'website.home')->name('home');

Route::view('/about', 'website.about')->name('about');
Route::view('/heritage', 'website.heritage')->name('heritage');
Route::view('/temple', 'website.temple')->name('temple');
Route::view('/community', 'website.community')->name('community');
Route::view('/events', 'website.events')->name('events');
Route::view('/gallery', 'website.gallery')->name('gallery');
Route::view('/donate', 'website.donate')->name('donate');
Route::view('/contact', 'website.contact')->name('contact');

require __DIR__.'/auth.php';