<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with(['category', 'store', 'images'])->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('admin.products.create', compact('categories', 'stores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'toko_id' => 'required|exists:stores,id',
            'tanggal_upload' => 'nullable|date',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('uploads/products', 'public');
                ProductImage::create([
                    'nama_file' => $path,
                    'produk_id' => $product->id,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $stores = Store::all();
        return view('admin.products.edit', compact('product', 'categories', 'stores'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'toko_id' => 'required|exists:stores,id',
            'tanggal_upload' => 'nullable|date',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('uploads/products', 'public');
                ProductImage::create([
                    'nama_file' => $path,
                    'produk_id' => $product->id,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->nama_file);
            $image->delete();
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
