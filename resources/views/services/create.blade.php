@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl rounded-[2rem] border border-violet-200 bg-white/90 p-8 shadow-sm">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Tambah Layanan Salon</h1>
        <p class="text-sm text-slate-600">Buat paket layanan baru untuk pelanggan Glow Salon.</p>
    </div>

    <form action="{{ route('services.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-slate-700">Nama Layanan</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Deskripsi</label>
            <textarea name="description" rows="4" class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200">{{ old('description') }}</textarea>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-slate-700">Harga</label>
                <input type="number" name="price" value="{{ old('price') }}" step="0.01" required class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Durasi</label>
                <input type="text" name="duration" value="{{ old('duration') }}" required placeholder="Contoh: 60 menit" class="mt-2 w-full rounded-2xl border border-violet-200 bg-violet-50 px-4 py-3 text-slate-900 outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-200" />
            </div>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('services.index') }}" class="rounded-2xl border border-slate-300 px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">Kembali</a>
            <button type="submit" class="rounded-2xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">Simpan</button>
        </div>
    </form>
</div>
@endsection