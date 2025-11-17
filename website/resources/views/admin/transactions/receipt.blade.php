<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            color: #333;
        }

        .card {
            border: 1px solid #ddd;
            padding: 18px;
            border-radius: 10px;
        }

        h2 {
            margin: 0;
            text-align: center;
            font-size: 20px;
        }

        .divider {
            border-bottom: 1px dashed #888;
            margin: 12px 0;
        }

        .row {
            margin-bottom: 8px;
        }

        .label {
            font-weight: bold;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="card">

        <h2>STRUK TRANSAKSI</h2>
        <div class="divider"></div>

        <div class="row">
            <span class="label">ID Transaksi:</span> #{{ $t->id }}
        </div>
        <div class="row">
            <span class="label">Tanggal:</span> {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
        </div>

        <div class="divider"></div>

        <h3>Detail Produk</h3>
        <div class="row">
            <span class="label">Produk:</span> {{ $t->product->nama_produk }}
        </div>
        <div class="row">
            <span class="label">Toko:</span> {{ $t->store->nama_toko }}
        </div>
        <div class="row">
            <span class="label">Harga Satuan:</span>
            Rp {{ number_format($t->product->harga, 0, ',', '.') }}
        </div>
        <div class="row">
            <span class="label">Jumlah:</span> {{ $t->qty }}
        </div>

        <div class="divider"></div>

        <div class="total">
            Total: Rp {{ number_format($t->total_price, 0, ',', '.') }}
        </div>

        <div class="divider"></div>

        <h3>Data Pembeli</h3>
        <div class="row">
            <span class="label">Nama:</span> {{ $t->buyer_name }}
        </div>
        <div class="row">
            <span class="label">Kontak:</span> {{ $t->buyer_phone }}
        </div>

        <div class="footer">
            Terima kasih telah bertransaksi!
        </div>

    </div>
</body>

</html>
