@extends('layouts.member')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold text-gray-900 mb-6">Edit Produk</h3>

        <form action="{{ route('member.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk*</label>
                <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga*</label>
                    <input type="number" name="harga" value="{{ $product->harga }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok*</label>
                    <input type="number" name="stok" value="{{ $product->stok }}" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                  focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi*</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">{{ $product->deskripsi }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Baru (opsional)</label>
                <input type="file" name="gambar[]" multiple
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-gray-900
                              focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div class="pt-4 flex items-center gap-3 justify-end">
                <a href="{{ route('member.products.index') }}"
                    class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700
                          hover:text-gray-900 hover:border-gray-400 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500
                               text-white font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i class="ri-save-2-line mr-1"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
