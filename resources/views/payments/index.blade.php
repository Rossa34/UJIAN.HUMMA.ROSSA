@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Manajemen Pembayaran</h1>
            <p class="text-sm text-slate-600">Catat pembayaran untuk booking layanan Glow Salon.</p>
        </div>
        <a href="{{ route('payments.create') }}" class="inline-flex items-center rounded-2xl bg-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-700">Tambah Pembayaran</a>
    </div>

    <div class="overflow-hidden rounded-[2rem] border border-violet-200 bg-white/90 shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-violet-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Booking</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Customer</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Jumlah</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Status</th>
                    <th class="px-6 py-3 text-right text-sm font-semibold text-slate-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse ($payments as $payment)
                <tr>
                    <td class="px-6 py-4 text-sm text-slate-900">Booking #{{ $payment->booking->id }} - {{ $payment->booking->service->name }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $payment->booking->customer->name }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ ucfirst($payment->status) }}</td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <a href="{{ route('payments.edit', $payment) }}" class="mr-3 text-violet-700 hover:text-violet-900">Edit</a>
                        <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-800" onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-sm text-slate-500">Belum ada pembayaran tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $payments->links() }}
</div>
@endsection