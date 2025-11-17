@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Edit Data Produk</h3>

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategori_id" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}" {{ $product->kategori_id == $c->id ? 'selected' : '' }}>
                                {{ $c->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Toko</label>
                    <select name="toko_id" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                        @foreach ($stores as $s)
                            <option value="{{ $s->id }}" {{ $product->toko_id == $s->id ? 'selected' : '' }}>
                                {{ $s->nama_toko }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="number" name="harga" value="{{ $product->harga }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ $product->stok }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Upload</label>
                    <input type="date" name="tanggal_upload" value="{{ $product->tanggal_upload }}"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">{{ $product->deskripsi }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tambah Gambar Baru</label>
                <input type="file" name="images[]" multiple
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div class="pt-4 flex items-center gap-3 justify-end">
                <a href="{{ route('products.index') }}"
                    class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:text-gray-900 hover:border-gray-400 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                               text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i class="ri-save-2-line mr-1"></i> Perbarui
                </button>
            </div>
        </form>

        <div class="mt-10 border-t pt-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Gambar Produk Saat Ini</h3>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @foreach ($product->images as $img)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $img->nama_file) }}"
                            class="rounded-xl h-32 w-full object-cover shadow-sm">
                        <form action="{{ route('product-images.destroy', $img->id) }}" method="POST"
                            class="absolute top-2 right-2 hidden group-hover:block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus gambar ini?')"
                                class="bg-red-600 text-white rounded-full p-1.5 hover:bg-red-700 transition">
                                <i class="ri-close-line"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
