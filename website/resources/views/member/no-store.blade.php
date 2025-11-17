@extends('layouts.member')

@section('content')
<div class="max-w-xl mx-auto text-center py-20">
    <h1 class="text-2xl font-bold text-gray-800">Anda Belum Memiliki Toko</h1>
    <p class="text-gray-600 mt-2">Silakan ajukan pembuatan toko untuk mulai berjualan.</p>

    <a href="{{ route('store.create') }}"
       class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700">
        Ajukan Pembuatan Toko
    </a>
</div>
@endsection
