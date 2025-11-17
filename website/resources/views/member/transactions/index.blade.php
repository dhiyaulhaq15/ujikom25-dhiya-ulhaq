@extends('layouts.member')

@section('content')
    <div class="bg-white shadow p-6 rounded-lg">

        <h1 class="text-xl font-bold mb-4">Transaksi Masuk</h1>

        @if (session('success'))
            <div class="p-3 bg-green-200 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Produk</th>
                    <th class="p-2 border">Pembeli</th>
                    <th class="p-2 border">Nomor WA</th>
                    <th class="p-2 border">Pesan</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transactions as $t)
                    <tr>
                        <td class="p-2 border">{{ $t->product->nama_produk }}</td>

                        <td class="p-2 border">{{ $t->buyer_name }}</td>

                        <td class="p-2 border">{{ $t->buyer_phone }}</td>

                        <td class="p-2 border">{{ $t->message }}</td>

                        <td class="p-2 border">
                            <span
                                class="px-2 py-1 rounded text-white
                            @if ($t->status == 'pending') bg-yellow-500
                            @elseif($t->status == 'confirmed') bg-green-600
                            @else bg-red-600 @endif">
                                {{ ucfirst($t->status) }}
                            </span>
                        </td>

                        <td class="p-2 border flex gap-2">

                            @if ($t->status == 'pending')
                                <!-- Konfirmasi -->
                                <form method="POST" action="{{ route('transactions.confirm', $t->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="px-3 py-1 bg-green-600 text-white rounded">
                                        Konfirmasi
                                    </button>
                                </form>

                                <!-- Tolak -->
                                <form method="POST" action="{{ route('transactions.reject', $t->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded">
                                        Tolak
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 text-center text-gray-500">
                            Belum ada transaksi masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
