@extends('layouts.member')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10 space-y-10">

        <!-- Hero Section -->
        <div
            class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl shadow-lg p-8 text-white flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-semibold">{{ $store ? $store->nama_toko : 'Dashboard Toko Anda' }}</h1>
                <p class="mt-2 text-indigo-100">
                    {{ $store ? $store->deskripsi : 'Kelola toko dan produk Anda dengan mudah.' }}</p>
            </div>
            @if ($store && $store->gambar)
                <img src="{{ asset('storage/' . $store->gambar) }}"
                    class="w-24 h-24 object-cover rounded-xl shadow-md border-2 border-white" />
            @endif
        </div>

        @if (!$store)
            <!-- Empty Store State -->
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png" class="w-24 mx-auto mb-6 opacity-80">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">Anda Belum Memiliki Toko</h2>
                <p class="text-gray-600 mb-6">Buat toko Anda untuk mulai menjual produk.</p>
                <a href="{{ route('store.create') }}"
                    class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium shadow-sm hover:shadow-md transition">
                    Ajukan Pembuatan Toko
                </a>
            </div>
        @else
            <!-- Info Tiles -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-sm text-gray-500">Produk</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $products->count() }}</h3>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-sm text-gray-500">Stok Total</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $products->sum('stok') }}</h3>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-sm text-gray-500">Penjualan Bulan Ini</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp0</h3>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-sm text-gray-500">Rating</p>
                    <h3 class="text-2xl font-bold text-gray-900">⭐ 4.8</h3>
                </div>
            </div>

            <!-- Produk Grid -->
            <h2 class="text-xl font-semibold text-gray-900 mt-12 mb-6">Produk Anda</h2>
            @if ($products->count() == 0)
                <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" class="w-20 mx-auto mb-6 opacity-70">
                    <p class="text-gray-500 mb-6">Belum ada produk. Mulai tambahkan produk Anda.</p>
                    <a href="{{ route('member.products.create') }}"
                        class="px-6 py-3 rounded-lg bg-gradient-to-r from-green-500 to-emerald-500 text-white font-medium shadow-sm hover:shadow-md transition">
                        Tambah Produk
                    </a>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="group bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden">
                            <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->nama_file) : 'https://via.placeholder.com/300' }}"
                                class="aspect-square w-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900">{{ $product->nama_produk }}</h3>
                                <p class="text-gray-600 text-sm">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="mt-3 block text-center px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium shadow-sm hover:shadow-md transition">
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
@endsection
