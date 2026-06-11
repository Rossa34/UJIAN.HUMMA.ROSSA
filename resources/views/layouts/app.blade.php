<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Glow Salon') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(234,179,255,0.35),_transparent_40%),linear-gradient(180deg,#f6edff_0%,#f5f0ff_100%)] text-slate-900">
    <div class="min-h-screen">
        <header class="border-b border-white/70 bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-30">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-violet-700">Glow Salon</a>
                    <p class="text-sm text-violet-600/80">Sistem Pelayanan Booking Salon</p>
                </div>
                @auth
                <nav class="hidden md:flex items-center gap-3 text-sm text-slate-700">
                    <a href="{{ route('dashboard') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">Dashboard</a>
                    <a href="{{ route('users.index') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">User</a>
                    <a href="{{ route('customers.index') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">Customer</a>
                    <a href="{{ route('services.index') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">Layanan</a>
                    <a href="{{ route('bookings.index') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">Booking</a>
                    <a href="{{ route('payments.index') }}" class="rounded-xl px-3 py-2 hover:bg-violet-100">Pembayaran</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="rounded-xl bg-violet-600 px-3 py-2 text-white hover:bg-violet-700">Logout</button>
                    </form>
                </nav>
                @endauth
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-6 rounded-2xl border border-violet-200 bg-violet-50 p-4 text-violet-700 shadow-sm">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-rose-700 shadow-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>