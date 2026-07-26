<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Hall;
use App\Services\BookingService;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected BookingService $service;

    public function __construct(BookingService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
{
    $bookings = Booking::with(['customer', 'hall'])
        ->when($request->search, function ($query) use ($request) {

            $search = $request->search;

            $query->where('booking_no', 'like', "%{$search}%")
                ->orWhereHas('customer', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('mobile', 'like', "%{$search}%");
                })
                ->orWhereHas('hall', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });

        })
        ->latest()
        ->paginate(15);

    return view('bookings.index', [

        'bookings' => $bookings,

        'totalBookings' => Booking::count(),

        'todayBookings' => Booking::whereDate('booking_date', today())->count(),

        'upcomingBookings' => Booking::whereDate('function_date', '>=', today())->count(),

        'cancelledBookings' => Booking::where('status', Booking::STATUS_CANCELLED)->count(),

    ]);
}

   public function create()
{
    $customers = Customer::orderBy('name')->get();
    $halls = Hall::active()->orderBy('name')->get();

    // Generate Booking Number
    $year = now()->format('Y');

    $lastBooking = Booking::whereYear('booking_date', $year)
        ->orderByDesc('id')
        ->first();

    if ($lastBooking) {

        $lastNumber = (int) substr($lastBooking->booking_no, -4);

        $nextNumber = $lastNumber + 1;

    } else {

        $nextNumber = 1;

    }

    $bookingNo = sprintf(
        'HVL-%s-%04d',
        $year,
        $nextNumber
    );

    return view(
        'bookings.create',
        compact(
            'customers',
            'halls',
            'bookingNo'
        )
    );
}

    public function store(StoreBookingRequest $request)
{
    $this->service->create($request->validated());

    return redirect()
        ->route('bookings.index')
        ->with('success', 'Booking created successfully.');
}

   public function show(Booking $booking)
{
    $booking->load(['customer', 'hall']);

    return view('bookings.show', compact('booking'));
}

  public function edit(Booking $booking)
{
    $booking->load(['customer', 'hall']);

    $customers = Customer::orderBy('name')->get();
    $halls = Hall::active()->orderBy('name')->get();

    return view(
        'bookings.edit',
        compact('booking', 'customers', 'halls')
    );
}

    public function update(UpdateBookingRequest $request, Booking $booking)
{
    $this->service->update($booking, $request->validated());

    return redirect()
        ->route('bookings.index')
        ->with('success', 'Booking updated successfully.');
}

    public function destroy(Booking $booking)
    {
        $this->service->delete($booking);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
   public function checkAvailability(Request $request)
{
    $request->validate([
        'hall_id' => 'required|integer',
        'function_date' => 'required|date',
    ]);

    $booking = Booking::with('customer')
        ->where('hall_id', $request->hall_id)
        ->whereDate('function_date', $request->function_date)
        ->where('status', '!=', Booking::STATUS_CANCELLED)
        ->first();

    if ($booking) {

        return response()->json([
            'available'     => false,
            'message'       => 'Hall is already booked.',
            'booking_no'    => $booking->booking_no,
            'customer_name' => $booking->customer?->name,
            'function_type' => $booking->function_type,
            'function_date' => $booking->function_date?->format('d-m-Y'),
        ]);
    }

    return response()->json([
        'available' => true,
        'message'   => 'Hall is available.',
    ]);
}
}