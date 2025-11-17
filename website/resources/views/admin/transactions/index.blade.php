@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm p-8">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Semua Transaksi</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 border-b font-medium text-center w-12">ID</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Produk</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Toko</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Pembeli</th>
                        <th class="py-3 px-4 border-b font-medium text-center">Jumlah</th>
                        <th class="py-3 px-4 border-b font-medium text-left">Total Harga</th>
                        <th class="py-3 px-4 border-b font-medium text-center">Status</th>
                        <th class="py-3 px-4 border-b font-medium text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($transactions as $t)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4 text-center">{{ $t->id }}</td>
                            <td class="py-3 px-4">{{ $t->product->nama_produk }}</td>
                            <td class="py-3 px-4">{{ $t->store->nama_toko }}</td>
                            <td class="py-3 px-4">{{ $t->buyer_name }} ({{ $t->buyer_phone }})</td>
                            <td class="py-3 px-4 text-center">{{ $t->qty }}</td>
                            <td class="py-3 px-4">Rp {{ number_format($t->total_price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-xs font-medium
                                    {{ $t->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : ($t->status == 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                            {{-- <td class="py-3 px-4 text-center">
                                <form action="{{ route('admin.transactions.updateStatus', $t->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status"
                                        class="rounded-lg border-gray-300 px-3 py-1.5 text-sm text-gray-900
                                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition"
                                        onchange="this.form.submit()">
                                        <option value="pending" {{ $t->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="confirmed" {{ $t->status == 'confirmed' ? 'selected' : '' }}>
                                            Confirmed</option>
                                        <option value="canceled" {{ $t->status == 'canceled' ? 'selected' : '' }}>Canceled
                                        </option>
                                    </select>
                                </form>
                            </td> --}}
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('admin.transactions.updateStatus', $t->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <select name="status"
                                        class="rounded-lg border-gray-300 px-3 py-1.5 text-sm text-gray-900
                   focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition"
                                        onchange="this.form.submit()">
                                        <option value="pending" {{ $t->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="confirmed" {{ $t->status == 'confirmed' ? 'selected' : '' }}>
                                            Confirmed</option>
                                        <option value="cancelled" {{ $t->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                        </option>
                                    </select>
                                </form>
                                @if ($t->status == 'confirmed')
                                    <a href="{{ route('admin.transactions.print', $t->id) }}"
                                        class="mt-2 inline-block bg-indigo-600 text-white text-xs font-semibold px-3 py-2 rounded-lg
                   hover:bg-indigo-700 transition">
                                        Cetak Struk
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
