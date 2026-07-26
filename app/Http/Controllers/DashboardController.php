<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Donor;
use App\Models\Hall;
use Carbon\Carbon;
use App\Models\Donation;

class DashboardController extends Controller
{
   public function index()
{
    return view('dashboard.index', [

        // Donation KPIs
        'todayDonation' => Donation::whereDate(
            'receipt_date',
            Carbon::today()
        )->sum('amount'),

        'monthDonation' => Donation::whereYear(
            'receipt_date',
            Carbon::now()->year
        )->whereMonth(
            'receipt_date',
            Carbon::now()->month
        )->sum('amount'),

        // Booking KPIs
        'todayBookings' => Booking::whereDate(
            'function_date',
            Carbon::today()
        )->count(),

        'upcomingBookings' => Booking::whereDate(
            'function_date',
            '>',
            Carbon::today()
        )->count(),

        // Existing statistics
        'monthBookings' => Booking::whereMonth(
            'function_date',
            Carbon::now()->month
        )->count(),

        'customers' => Customer::count(),

        'donors' => Donor::count(),

        'halls' => Hall::count(),

        'recentBookings' => Booking::latest()
            ->take(10)
            ->get(),

    ]);
}
}