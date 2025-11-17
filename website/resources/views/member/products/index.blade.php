@extends('layouts.member')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10 space-y-10">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-gray-900">Produk Saya</h1>
            <a href="{{ route('member.products.create') }}"
                class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-green-500 to-emerald-500
                  text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                + Tambah Produk
            </a>
        </div>

        @if ($products->count() == 0)
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-gray-200">
                <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" class="w-24 mx-auto mb-6 opacity-70">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">Belum Ada Produk</h2>
                <p class="text-gray-600 mb-6">Tambahkan produk pertama Anda untuk mulai berjualan.</p>
                <a href="{{ route('member.products.create') }}"
                    class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                      text-white font-medium shadow-sm hover:shadow-md transition">
                    Tambah Produk
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8">
                @foreach ($products as $p)
                    <div
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden border border-gray-100">
                        <div class="relative">
                            <img src="{{ $p->images->first() ? asset('storage/' . $p->images->first()->nama_file) : 'https://via.placeholder.com/300' }}"
                                class="aspect-square w-full object-cover group-hover:scale-105 transition-transform duration-300 rounded-t-2xl">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition flex items-center justify-center">
                                <a href="{{ route('member.products.edit', $p->id) }}"
                                    class="hidden group-hover:block px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                                      text-white font-medium shadow-sm hover:shadow-md transition">
                                    Edit Produk
                                </a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900">{{ $p->nama_produk }}</h3>
                            <p class="text-gray-600 text-sm">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
