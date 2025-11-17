<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← tambah ini

class MemberProductController extends Controller
{
    public function index()
    {
        $store = Store::where('user_id', Auth::id())->first(); // ← aman

        if (!$store) {
            return redirect()->route('member.dashboard')
                ->with('error', 'Anda belum memiliki toko.');
        }

        $products = Product::with('images')
            ->where('toko_id', $store->id)
            ->get();

        return view('member.products.index', compact('products'));
    }

    public function create()
    {
        return view('member.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'gambar.*' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $store = Store::where('user_id', Auth::id())->first(); // ← aman

        $product = Product::create([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'toko_id' => $store->id
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('product_images', 'public');

                ProductImage::create([
                    'produk_id' => $product->id,
                    'nama_file' => $path
                ]);
            }
        }

        return redirect()->route('member.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('member.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'gambar.*' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('product_images', 'public');

                ProductImage::create([
                    'produk_id' => $product->id,
                    'nama_file' => $path
                ]);
            }
        }

        return redirect()->route('member.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }
}
