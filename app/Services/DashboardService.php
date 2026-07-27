<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\Seva;
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

          'totalBookings' => Cache::remember(
    'dashboard.totalBookings',
    300,
    fn () => Booking::count()
),

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
'totalDonors' => Donor::count(),

'totalSevas' => Seva::count(),

'todayDonations' => Donation::whereDate(
    'receipt_date',
    today()
)->sum('amount'),

'monthDonations' => Donation::whereYear(
    'receipt_date',
    now()->year
)
->whereMonth(
    'receipt_date',
    now()->month
)
->sum('amount'),

'recentDonations' => Donation::latest()
    ->take(5)
    ->get(),
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

            'donationChartLabels' => $donationChart->map(function ($item) {
    return date('M', mktime(0, 0, 0, $item->month, 1));
}),

'donationChartData' => $donationChart->pluck('total'),
            
        ];
        
        /*
|--------------------------------------------------------------------------
| Donation Chart Data
|--------------------------------------------------------------------------
*/

$donationChart = Donation::selectRaw(
    'MONTH(receipt_date) as month,
     SUM(amount) as total'
)
->whereYear(
    'receipt_date',
    now()->year
)
->groupBy(DB::raw('MONTH(receipt_date)'))
->orderBy('month')
->get();
    }
}