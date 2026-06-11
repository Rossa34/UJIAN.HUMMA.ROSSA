@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Manajemen Customer</h1>
            <p class="text-sm text-slate-600">Kelola data customer untuk layanan Glow Salon.</p>
        </div>
        <a href="{{ route('customers.create') }}" class="inline-flex items-center rounded-2xl bg-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-700">Tambah Customer</a>
    </div>

    <div class="overflow-hidden rounded-[2rem] border border-violet-200 bg-white/90 shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-violet-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-slate-700">Telepon</th>
                    <th class="px-6 py-3 text-right text-sm font-semibold text-slate-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse ($customers as $customer)
                    <tr>
                        <td class="px-6 py-4 text-sm text-slate-900">{{ $customer->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $customer->email }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $customer->phone }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('customers.edit', $customer) }}" class="mr-3 text-rose-400 hover:text-rose-900">Edit</a>
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800" onclick="return confirm('Hapus customer ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-sm text-slate-500">Belum ada customer terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $customers->links() }}
</div>
@endsection
