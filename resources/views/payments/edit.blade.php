@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl rounded-[2rem] border border-violet-200 bg-white/90 p-8 shadow-sm">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Edit Pembayaran</h1>
        <p class="text-sm text-slate-600">Perbarui detail pembayaran booking.</p>
    </div>

    <form action="{{ route('payments.update', $payment) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700">Booking</label>
            <select name="booking_id" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">
                <option value="">Pilih booking</option>
                @foreach ($bookings as $booking)
                    <option value="{{ $booking->id }}" {{ old('booking_id', $payment->booking_id) == $booking->id ? 'selected' : '' }}>
                        #{{ $booking->id }} - {{ $booking->customer->name }} / {{ $booking->service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Jumlah</label>
            <input type="number" name="amount" value="{{ old('amount', $payment->amount) }}" step="0.01" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Metode Pembayaran</label>
            <input type="text" name="payment_method" value="{{ old('payment_method', $payment->payment_method) }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Status</label>
            <select name="status" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">
                <option value="pending" {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ old('status', $payment->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="failed" {{ old('status', $payment->status) == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Tanggal Bayar</label>
            <input type="date" name="paid_at" value="{{ old('paid_at', $payment->paid_at?->toDateString()) }}" class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('payments.index') }}" class="rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
            <button type="submit" class="rounded-2xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">Perbarui Pembayaran</button>
        </div>
    </form>
</div>
@endsection
