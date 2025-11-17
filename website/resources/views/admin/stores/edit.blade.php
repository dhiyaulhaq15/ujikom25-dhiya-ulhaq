@extends('layouts.admin')

@section('title', 'Edit Toko')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Edit Data Toko</h3>

        <form method="POST" action="{{ route('stores.update', $store->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Toko</label>
                <input type="text" name="nama_toko" value="{{ old('nama_toko', $store->nama_toko) }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">{{ old('deskripsi', $store->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                @if ($store->gambar)
                    <img src="{{ asset('storage/' . $store->gambar) }}" alt="gambar"
                        class="w-32 h-32 object-cover rounded-lg mb-3 shadow-sm">
                @endif
                <input type="file" name="gambar" accept="image/*"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kontak Toko</label>
                    <input type="text" name="kontak_toko" value="{{ old('kontak_toko', $store->kontak_toko) }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $store->alamat) }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik (User)</label>
                <select name="user_id" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $store->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4 flex items-center gap-3">
                <button
                    class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                           text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i class="ri-save-2-line mr-1"></i> Update
                </button>
                <a href="{{ route('stores.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Batal</a>
            </div>
        </form>
    </div>
@endsection
