@extends('layouts.member')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="bg-white rounded-2xl shadow-sm p-10 max-w-lg text-center">
            <div class="flex justify-center mb-6">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-100">
                    <i class="ri-store-2-line text-3xl text-red-600"></i>
                </div>
            </div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Toko Anda Dinonaktifkan</h3>
            <p class="text-gray-600 leading-relaxed mb-6">
                Silakan hubungi admin untuk mengaktifkan kembali toko Anda.
            </p>
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                      text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection
