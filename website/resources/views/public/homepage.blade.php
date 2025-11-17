@extends('layouts.public')
@section('content')
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Category</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:space-y-0 lg:gap-x-6">
                    <div class="group relative">
                        <img src="{{ asset('images/ai-empowers-startups-by-forecasting-600nw-2656382847.webp') }}"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-2/1 lg:aspect-square" />
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Digital Technology & Applications
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Aplikasi, website, dan produk digital</p>
                    </div>
                    <div class="group relative">
                        <img src="{{ asset('images/84368ebd-3c3c-450d-a24a-c8a138c34f05_GENERIC_RESTAURANT_IMAGE_2.jpeg') }}"
                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-2/1 lg:aspect-square" />
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Makanan & Minuman
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Produk kuliner buatan warga sekolah</p>
                    </div>
                    <div class="group relative">
                        <img src="{{ asset('images/mannquins.webp') }}"
                            alt="Collection of four insulated travel bottles on wooden shelf."
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-2/1 lg:aspect-square" />
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                Fashion and Merchandise
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">Pakaian dan merchandise sekolah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Popular product</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="group relative bg-white p-4 rounded-xl shadow-sm hover:shadow-lg transition">

                        <!-- GAMBAR PRODUK -->
                        <div class="relative">
                            <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->nama_file) : 'https://via.placeholder.com/300' }}"
                                alt="{{ $product->nama_produk }}"
                                class="aspect-square w-full rounded-xl bg-gray-200 object-cover group-hover:opacity-75" />

                            <!-- Harga -->
                            <p
                                class="absolute bottom-2 right-2 bg-white/80 backdrop-blur-sm px-2 py-1 text-sm font-semibold text-gray-800 rounded-md">
                                Rp. {{ number_format($product->harga, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- DETAIL PRODUK -->
                        <div class="mt-4">
                            <h3 class="text-sm font-medium text-gray-900">
                                {{ $product->nama_produk }}
                            </h3>

                            <!-- Nama kategori -->
                            <p class="text-sm text-gray-500">
                                Kategori: {{ $product->category->nama_kategori }}
                            </p>

                            <!-- Nama toko -->
                            <p class="text-xs text-gray-400">
                                Toko: {{ $product->store->nama_toko }}
                            </p>

                            <!-- Stok -->
                            <p class="text-xs font-semibold text-gray-600 mt-1">
                                Stok: {{ $product->stok }}
                            </p>
                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="flex gap-2 mt-3">

                            <!-- Tombol detail -->
                            <a href="{{ url('/product/' . $product->id) }}"
                                class="flex-1 bg-blue-600 text-white text-center text-sm font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
                                Detail
                            </a>

                            <!-- Tombol WhatsApp -->
                            <a href="{{ route('transaction.form', $product->id) }}"
                                class="flex-1 bg-green-500 text-white text-center text-sm font-semibold py-2 rounded-lg hover:bg-green-600 transition">
                                Beli
                            </a>


                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection
