@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Manajemen Layanan Salon</h1>
            <p class="text-sm text-slate-600">Kelola paket layanan untuk pelanggan Glow Salon.</p>
        </div>
        <a href="{{ route('services.create') }}" class="inline-flex items-center rounded-2xl bg-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-700">Tambah Layanan</a>
    </div>

    <div class="overflow-hidden rounded-[2rem] border border-violet-200 bg-white/90 shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-violet-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Harga</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Durasi</th>
                    <th class="px-6 py-3 text-right text-sm font-semibold text-slate-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse ($services as $service)
                <tr>
                    <td class="px-6 py-4 text-sm text-slate-900">{{ $service->name }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $service->duration }}</td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <a href="{{ route('services.edit', $service) }}" class="mr-3 text-violet-700 hover:text-violet-900">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-800" onclick="return confirm('Hapus layanan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-sm text-slate-500">Belum ada layanan salon.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $services->links() }}
</div>
@endsection