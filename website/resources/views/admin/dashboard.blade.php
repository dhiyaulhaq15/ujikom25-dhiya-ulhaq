@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-3">
            Selamat Datang, {{ Auth::user()->name }}
        </h3>
        <p class="text-gray-600 leading-relaxed">
            Ini adalah halaman utama admin. Gunakan sidebar untuk mengelola data pengguna, toko, produk,
            dan kategori.
        </p>
    </div>
@endsection
