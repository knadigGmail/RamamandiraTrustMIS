<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CodeGeneratorService
{
    public static function generate(string $table, string $column, string $prefix, int $digits = 6): string
    {
        $lastCode = DB::table($table)
            ->orderByDesc('id')
            ->value($column);

        $next = 1;

        if ($lastCode && preg_match('/(\d+)$/', $lastCode, $matches)) {
            $next = (int) $matches[1] + 1;
        }

        return $prefix . str_pad($next, $digits, '0', STR_PAD_LEFT);
    }

    public static function generateBooking(): string
    {
        $year = now()->year;

        $last = DB::table('bookings')
            ->whereYear('booking_date', $year)
            ->orderByDesc('id')
            ->value('booking_no');

        $next = 1;

        if ($last && preg_match('/(\d+)$/', $last, $matches)) {
            $next = (int) $matches[1] + 1;
        }

        return 'BK' . $year . '-' . str_pad($next, 6, '0', STR_PAD_LEFT);
    }
}