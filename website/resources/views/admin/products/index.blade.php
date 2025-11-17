@extends('layouts.admin')

@section('title', 'Data Produk')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Daftar Produk</h3>
            <a href="{{ route('products.create') }}"
                class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                      text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                <i class="ri-add-line text-lg"></i> Tambah Produk
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 flex items-center gap-2 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
                <i class="ri-checkbox-circle-line text-lg"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b font-medium text-center w-12">#</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Nama Produk</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Kategori</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Toko</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Harga</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Stok</th>
                        <th class="py-3 px-4 border-b font-medium text-center">Gambar</th>
                        <th class="py-3 px-4 border-b font-medium text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $p)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $p->nama_produk }}</td>
                            <td class="py-3 px-4">{{ $p->category->nama_kategori ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $p->store->nama_toko ?? '-' }}</td>
                            <td class="py-3 px-4">Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">{{ $p->stok }}</td>
                            <td class="py-3 px-4 text-center">
                                @if ($p->images->first())
                                    <img src="{{ asset('storage/' . $p->images->first()->nama_file) }}"
                                        class="h-12 w-12 object-cover rounded-lg shadow-sm">
                                @else
                                    <span class="text-gray-400 italic">No Image</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('products.edit', $p->id) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $p->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus produk ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors"
                                            title="Hapus">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-6 italic">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
