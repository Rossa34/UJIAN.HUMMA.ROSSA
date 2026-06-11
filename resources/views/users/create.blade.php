@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl rounded-[2rem] border border-violet-200 bg-white/90 p-8 shadow-sm">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Tambah User Baru</h1>
        <p class="text-sm text-slate-600">Isi data user untuk memberikan akses ke aplikasi Glow Salon.</p>
    </div>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Password</label>
            <input type="password" name="password" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <label class="inline-flex items-center gap-3 text-sm text-slate-700">
            <input type="checkbox" name="is_admin" value="1" class="h-4 w-4 rounded border-violet-300 text-violet-600 focus:ring-violet-500" />
            Jadikan user sebagai admin
        </label>

        <div class="flex items-center gap-3">
            <a href="{{ route('users.index') }}" class="rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
            <button type="submit" class="rounded-2xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">Simpan</button>
        </div>
    </form>
</div>
@endsection