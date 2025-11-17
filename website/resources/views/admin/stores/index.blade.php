@extends('layouts.admin')

@section('title', 'Kelola Toko')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">

        @if (session('success'))
            <div class="mb-6 flex items-center gap-2 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                <i class="ri-checkbox-circle-line text-lg"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Daftar Toko</h3>
            <a href="{{ route('stores.create') }}"
                class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                      text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                <i class="ri-add-line text-lg"></i> Tambah Toko
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b font-medium text-center">#</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Nama Toko</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Pemilik</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Kontak</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Alamat</th>
                        <th class="py-3 px-4 border-b font-medium text-center w-48">Status</th>
                        <th class="py-3 px-4 border-b font-medium text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($stores as $store)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $store->nama_toko }}</td>
                            <td class="py-3 px-4">{{ $store->user->name ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $store->kontak_toko }}</td>
                            <td class="py-3 px-4">{{ $store->alamat }}</td>
                            <td class="py-3 px-4 text-center">
                                @if ($store->status === 'pending')
                                    <form action="{{ route('stores.approve', $store->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class="px-3 py-1.5 rounded-md bg-green-500 text-white text-xs font-medium
                                                   hover:bg-green-600 transition">
                                            Setujui
                                        </button>
                                    </form>
                                @elseif ($store->status === 'active')
                                    <form action="{{ route('stores.deactivate', $store->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class="px-3 py-1.5 rounded-md bg-yellow-500 text-white text-xs font-medium
                                                   hover:bg-yellow-600 transition">
                                            Nonaktifkan
                                        </button>
                                    </form>
                                @elseif ($store->status === 'inactive')
                                    <form action="{{ route('stores.approve', $store->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class="px-3 py-1.5 rounded-md bg-blue-500 text-white text-xs font-medium
                                                   hover:bg-blue-600 transition">
                                            Aktifkan
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('stores.edit', $store->id) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                        <i class="ri-edit-2-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('stores.destroy', $store->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus toko ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors"
                                            title="Hapus">
                                            <i class="ri-delete-bin-6-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $stores->links() }}
        </div>
    </div>
@endsection
