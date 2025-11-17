@extends('layouts.member')

@section('content')
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">Ajukan Pembuatan Toko</h1>

        <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-xl shadow-lg space-y-5">
            @csrf

            <div>
                <label class="font-semibold">Nama Toko</label>
                <input type="text" name="nama_toko" class="w-full mt-1 border rounded-lg p-2" required>
            </div>

            <div>
                <label class="font-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="w-full mt-1 border rounded-lg p-2" required></textarea>
            </div>

            <div>
                <label class="font-semibold">Kontak Toko</label>
                <input type="text" name="kontak_toko" class="w-full mt-1 border rounded-lg p-2" required>
            </div>

            <div>
                <label class="font-semibold">Alamat Toko</label>
                <input type="text" name="alamat" class="w-full mt-1 border rounded-lg p-2" required>
            </div>

            <div>
                <label class="font-semibold">Foto Toko (Opsional)</label>
                <input type="file" name="gambar" class="mt-1">
            </div>

            <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Ajukan Toko
            </button>
        </form>

    </div>
@endsection
