<?php

namespace App\Services;

use App\Models\NumberSeries;
use Illuminate\Support\Facades\DB;

class NumberSeriesService
{
    /**
     * Generate next document number.
     */
    public function next(string $module): string
    {
        return DB::transaction(function () use ($module) {

            $financialYear = $this->financialYear();

            $series = NumberSeries::firstOrCreate(
                [
                    'module' => $module,
                    'financial_year' => $financialYear,
                ],
                [
                    'prefix' => strtoupper(substr($module, 0, 3)),
                    'last_number' => 0,
                    'is_active' => true,
                ]
            );

            $series->increment('last_number');

            return sprintf(
                '%s/%s/%06d',
                $series->prefix,
                $financialYear,
                $series->last_number
            );

        });
    }

    /**
     * Returns Financial Year.
     * Example: 2026-27
     */
    private function financialYear(): string
    {
        $year = now()->year;
        $month = now()->month;

        if ($month >= 4) {

            return $year . '-' . substr($year + 1, -2);

        }

        return ($year - 1) . '-' . substr($year, -2);
    }
}