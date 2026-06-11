<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index', [
            'bookings' => Booking::with(['customer', 'service'])->orderByDesc('booking_date')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('bookings.create', [
            'customers' => Customer::orderBy('name')->get(),
            'services' => Service::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'service_id' => ['required', 'exists:services,id'],
            'booking_date' => ['required', 'date'],
            'booking_time' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:pending,confirmed,canceled'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $service = Service::findOrFail($data['service_id']);
        $data['total'] = $service->price;
        $data['user_id'] = Auth::id();

        Booking::create($data);

        return redirect()->route('bookings.index')->with('success', 'Booking layanan berhasil dibuat.');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking,
            'customers' => Customer::orderBy('name')->get(),
            'services' => Service::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'service_id' => ['required', 'exists:services,id'],
            'booking_date' => ['required', 'date'],
            'booking_time' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:pending,confirmed,canceled'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $service = Service::findOrFail($data['service_id']);
        $data['total'] = $service->price;

        $booking->update($data);

        return redirect()->route('bookings.index')->with('success', 'Booking layanan berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking layanan berhasil dihapus.');
    }
}
