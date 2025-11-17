@extends('layouts.member')

@section('content')
    <div class="max-w-2xl mx-auto py-12">
        <div class="bg-white p-8 rounded-xl shadow text-center">
            <h2 class="text-2xl font-semibold mb-2">Pengajuan Toko Sedang Diproses</h2>

            @if (isset($store))
                <p class="text-gray-600">Toko <span class="font-semibold">{{ $store->nama_toko }}</span> sedang menunggu
                    persetujuan admin.</p>
            @else
                <p class="text-gray-600">Pengajuan toko Anda sedang diproses. Silakan tunggu konfirmasi admin.</p>
            @endif

            <p class="mt-4 text-sm text-gray-500">Kami akan memberi tahu Anda begitu admin menyetujui pengajuan.</p>
        </div>
    </div>
@endsection
