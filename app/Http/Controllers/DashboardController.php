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

        'todayBookings' => Booking::whereDate(
            'function_date',
            today()
        )->count(),

        'monthBookings' => Booking::whereMonth(
            'function_date',
            now()->month
        )->count(),

        'customers' => Customer::count(),

        'donors' => Donor::count(),

        'halls' => Hall::count(),

        'todayDonations' => Donation::whereDate(
            'receipt_date',
            today()
        )->sum('amount'),

        'monthDonations' => Donation::whereMonth(
            'receipt_date',
            now()->month
        )->sum('amount'),

        'recentBookings' => Booking::latest()
            ->take(5)
            ->get(),

        'recentDonations' => Donation::latest()
            ->take(5)
            ->get(),

    ]);
}
}