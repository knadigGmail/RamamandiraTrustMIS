<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getDashboardData(): array
    {
        /*
        |--------------------------------------------------------------------------
        | Booking Chart Data
        |--------------------------------------------------------------------------
        */

        $bookingChart = Booking::selectRaw('MONTH(booking_date) as month, COUNT(*) as total')
            ->whereYear('booking_date', now()->year)
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->orderBy('month')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Return Dashboard Data
        |--------------------------------------------------------------------------
        */

        return [

            'totalBookings' => Booking::count(),

            'todayBookings' => Booking::whereDate(
                'booking_date',
                Carbon::today()
            )->count(),

            'upcomingBookings' => Booking::whereDate(
                'function_date',
                '>=',
                Carbon::today()
            )->count(),

            'cancelledBookings' => Booking::where(
                'status',
                'Cancelled'
            )->count(),

            'totalCustomers' => Customer::count(),

            'totalHalls' => Hall::count(),

            'activeHalls' => Hall::where(
                'status',
                true
            )->count(),

            'monthlyRevenue' => Booking::whereYear('booking_date', now()->year)
                ->whereMonth('booking_date', now()->month)
                ->sum('hall_rent'),

            'outstandingAmount' => Booking::sum('balance_amount'),

            'recentBookings' => Booking::latest()
                ->take(5)
                ->get(),

            /*
            |--------------------------------------------------------------------------
            | Chart Data
            |--------------------------------------------------------------------------
            */

            'bookingChartLabels' => $bookingChart->map(function ($item) {
                return date('M', mktime(0, 0, 0, $item->month, 1));
            }),

            'bookingChartData' => $bookingChart->pluck('total'),

        ];
    }
}