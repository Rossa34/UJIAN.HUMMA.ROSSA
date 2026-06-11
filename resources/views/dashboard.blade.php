@extends('layouts.app')

@section('content')
<div class="grid gap-6 lg:grid-cols-3">
    <div class="rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm">
        <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Total Users</p>
        <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalUsers }}</h2>
    </div>
    <div class="rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm">
        <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Customers</p>
        <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalCustomers }}</h2>
    </div>
    <div class="rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm">
        <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Services</p>
        <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalServices }}</h2>
    </div>
    <div class="rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm">
        <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Bookings</p>
        <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalBookings }}</h2>
    </div>
    <div class="rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm lg:col-span-2">
        <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Payments</p>
        <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $totalPayments }}</h2>
    </div>
</div>

<section class="mt-10 rounded-[2rem] border border-violet-200 bg-white/90 p-6 shadow-sm">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.2em] text-violet-600">Salam dari Glow Salon</p>
            <h1 class="text-3xl font-semibold text-slate-900">Selamat datang di sistem booking salon</h1>
        </div>
        <div class="rounded-3xl bg-violet-50 px-5 py-4 text-violet-700">Kelola pelanggan, layanan, booking, dan pembayaran dengan mudah.</div>
    </div>
</section>
@endsection