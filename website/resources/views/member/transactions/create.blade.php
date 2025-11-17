@extends('layouts.public')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow mt-10">

        <h2 class="text-xl font-bold mb-3">Beli {{ $product->nama_produk }}</h2>

        <form action="{{ route('transaction.store', $product->id) }}" method="POST">
            @csrf

            <label class="block mt-3">Nama Anda</label>
            <input name="buyer_name" class="w-full p-3 border rounded-lg" required>

            <label class="block mt-3">No WhatsApp</label>
            <input name="buyer_phone" class="w-full p-3 border rounded-lg" required>

            <label class="block mt-3">Jumlah</label>
            <input type="number" name="qty" value="1" min="1" class="w-full p-3 border rounded-lg"
                required>

            <button class="w-full bg-green-600 text-white py-3 rounded-lg mt-5">
                Lanjutkan ke WhatsApp
            </button>
        </form>

    </div>
@endsection
