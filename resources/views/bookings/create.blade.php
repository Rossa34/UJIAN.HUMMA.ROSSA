@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl rounded-[2rem] border border-violet-200 bg-white/90 p-8 shadow-sm">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Tambah Booking</h1>
        <p class="text-sm text-slate-600">Buat booking layanan salon untuk customer Glow Salon.</p>
    </div>

    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700">Customer</label>
            <select name="customer_id" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">
                <option value="">Pilih customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Layanan</label>
            <select name="service_id" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">
                <option value="">Pilih layanan</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-700">Tanggal</label>
                <input type="date" name="booking_date" value="{{ old('booking_date') }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Waktu</label>
                <input type="time" name="booking_time" value="{{ old('booking_time') }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Status</label>
            <select name="status" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Catatan</label>
            <textarea name="notes" rows="4" class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">{{ old('notes') }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('bookings.index') }}" class="rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
            <button type="submit" class="rounded-2xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">Simpan Booking</button>
        </div>
    </form>
</div>
@endsection
