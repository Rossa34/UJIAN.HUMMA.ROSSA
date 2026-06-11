<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.index', [
            'payments' => Payment::with(['booking.customer', 'booking.service'])->orderByDesc('paid_at')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('payments.create', [
            'bookings' => Booking::with(['customer', 'service'])->orderByDesc('booking_date')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => ['required', 'exists:bookings,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_method' => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:pending,completed,failed'],
            'paid_at' => ['nullable', 'date'],
        ]);

        $booking = Booking::findOrFail($data['booking_id']);

        Payment::create([
            'booking_id' => $booking->id,
            'customer_id' => $booking->customer_id,
            'amount' => $data['amount'],
            'payment_method' => $data['payment_method'],
            'status' => $data['status'],
            'paid_at' => $data['paid_at'] ?? now(),
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dicatat.');
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', [
            'payment' => $payment,
            'bookings' => Booking::with(['customer', 'service'])->orderByDesc('booking_date')->get(),
        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'booking_id' => ['required', 'exists:bookings,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'payment_method' => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:pending,completed,failed'],
            'paid_at' => ['nullable', 'date'],
        ]);

        $booking = Booking::findOrFail($data['booking_id']);

        $payment->update([
            'booking_id' => $booking->id,
            'customer_id' => $booking->customer_id,
            'amount' => $data['amount'],
            'payment_method' => $data['payment_method'],
            'status' => $data['status'],
            'paid_at' => $data['paid_at'] ?? now(),
        ]);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
