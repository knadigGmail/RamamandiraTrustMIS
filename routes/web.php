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

    Route::get(
    '/donations/{donation}/receipt',
    [DonationController::class, 'receipt']
)->name('donations.receipt');
});

require __DIR__.'/auth.php';