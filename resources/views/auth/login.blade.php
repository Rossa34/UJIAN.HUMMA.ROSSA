@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-md rounded-[2rem] border border-violet-200 bg-white/90 p-8 shadow-2xl shadow-violet-200/40">
    <div class="space-y-4 text-center">
        <h1 class="text-3xl font-semibold text-violet-700">Glow Salon</h1>
        <p class="text-sm text-slate-600">Masuk untuk mengakses sistem pelayanan booking salon.</p>
    </div>

    <form method="POST" action="{{ route('login.perform') }}" class="mt-8 space-y-6">
        @csrf

        <label class="block text-sm font-medium text-slate-700">
            Email
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </label>

        <label class="block text-sm font-medium text-slate-700">
            Password
            <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </label>

        <div class="flex items-center justify-between text-sm text-slate-600">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-violet-300 text-violet-600 focus:ring-violet-500" />
                Remember me
            </label>
        </div>

        <button type="submit" class="w-full rounded-2xl bg-violet-600 px-4 py-3 text-white shadow-sm shadow-violet-500/20 transition hover:bg-violet-700">Masuk</button>
    </form>
</div>
@endsection