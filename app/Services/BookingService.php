<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Hall;
use Illuminate\Support\Facades\DB;
use Exception;

class BookingService
{
    public function create(array $data): Booking
    {
        return DB::transaction(function () use ($data) {

            // Generate Booking Number
            $data['booking_no'] = CodeGeneratorService::generateBooking();

            // Check Hall Availability
            if (!BookingAvailabilityService::isAvailable(
                $data['hall_id'],
                $data['function_date']
            )) {
                throw new Exception('This hall is already booked for the selected date.');
            }

            // Load Hall
            $hall = Hall::findOrFail($data['hall_id']);

            // Calculate Charges
            $charges = HallChargeService::calculate($hall);

            $data = array_merge($data, $charges);

            // Balance
            $data['balance_amount'] =
                $data['total_amount'] - ($data['advance_amount'] ?? 0);

            return Booking::create($data);
        });
    }

    public function update(Booking $booking, array $data): Booking
    {
        if (!BookingAvailabilityService::isAvailable(
            $data['hall_id'],
            $data['function_date'],
            $booking->id
        )) {
            throw new Exception('This hall is already booked for the selected date.');
        }

        $hall = Hall::findOrFail($data['hall_id']);

        $charges = HallChargeService::calculate($hall);

        $data = array_merge($data, $charges);

        $data['balance_amount'] =
            $data['total_amount'] - ($data['advance_amount'] ?? 0);

        $booking->update($data);

        return $booking;
    }

    public function delete(Booking $booking): void
    {
        $booking->delete();
    }
}