<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
Route::redirect('/', '/login');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('trustees', TrusteeController::class);
    Route::resource('donors', DonorController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('halls', HallController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('bookings', BookingController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('/api/halls/{hall}', [HallController::class, 'details'])
        ->name('halls.details');
        Route::get(
    '/api/bookings/check-availability',
    [BookingController::class, 'checkAvailability']
)->name('bookings.checkAvailability');

Route::middleware(['auth'])->group(function () {

    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class)
        ->only(['index','edit','update']);

});

Route::get('/settings', [SettingController::class, 'index'])
    ->name('settings.index');

Route::put('/settings', [SettingController::class, 'update'])
    ->name('settings.update');
    Route::resource('financial-accounts', FinancialAccountController::class);
    Route::resource('sevas', SevaController::class);
    Route::resource('donations', DonationController::class);
});
Route::get(
    '/donations/{donation}/receipt',
    [App\Http\Controllers\DonationController::class, 'receipt']
)->name('donations.receipt');
require __DIR__.'/auth.php';