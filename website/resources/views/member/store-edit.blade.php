@extends('layouts.member')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">

    <h3 class="text-2xl font-semibold mb-6">Edit Informasi Toko</h3>

    <form action="{{ route('store.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama Toko -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Toko</label>
            <input type="text" name="nama_toko"
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                value="{{ old('nama_toko', $store->nama_toko) }}">
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                rows="4">{{ old('deskripsi', $store->deskripsi) }}</textarea>
        </div>

        <!-- Kontak -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Kontak Toko</label>
            <input type="text" name="kontak_toko"
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                value="{{ old('kontak_toko', $store->kontak_toko) }}">
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Alamat</label>
            <input type="text" name="alamat"
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300"
                value="{{ old('alamat', $store->alamat) }}">
        </div>

        <!-- Gambar -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Gambar Toko</label>

            @if ($store->gambar)
                <img src="{{ asset('storage/' . $store->gambar) }}"
                     class="w-32 h-auto rounded-md shadow mb-2">
            @endif

            <input type="file" name="gambar"
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Tombol -->
        <button
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
            Simpan Perubahan
        </button>

    </form>

</div>
@endsection
