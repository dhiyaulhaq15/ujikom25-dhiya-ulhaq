@extends('layouts.public')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Semua Produk</h1>

    @if ($products->isEmpty())
        <p class="text-center text-gray-500">Belum ada produk yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="group relative bg-white p-4 rounded-xl shadow-sm hover:shadow-lg transition">
                    <div class="relative">
                        @php
                            $image = $product->images->first();
                        @endphp

                        @if ($image)
                            <img src="{{ asset('storage/' . $image->nama_file) }}" alt="{{ $product->nama_produk }}"
                                class="aspect-square w-full rounded-xl bg-gray-200 object-cover group-hover:opacity-75" />
                        @else
                            <img src="https://via.placeholder.com/400x400?text=No+Image" alt="No Image"
                                class="aspect-square w-full rounded-xl bg-gray-200 object-cover group-hover:opacity-75" />
                        @endif

                        <p
                            class="absolute bottom-2 right-2 bg-white/80 backdrop-blur-sm px-2 py-1 text-sm font-semibold text-gray-800 rounded-md">
                            Rp. {{ number_format($product->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-sm font-medium text-gray-900">{{ $product->nama_produk }}</h3>
                        <p class="text-sm text-gray-500">{{ $product->store->nama_toko ?? 'Toko tidak diketahui' }}</p>
                    </div>

                    <a href="https://wa.me/{{ $product->store->kontak_toko ?? '' }}?text=Halo,%20saya%20ingin%20memesan%20{{ urlencode($product->nama_produk) }}"
                        target="_blank"
                        class="mt-3 block w-full text-center bg-green-600 text-white text-sm font-semibold py-2 rounded-lg hover:bg-green-700 transition">
                        Hubungi via WhatsApp
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
