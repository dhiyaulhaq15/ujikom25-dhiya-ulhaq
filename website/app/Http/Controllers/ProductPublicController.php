<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPublicController extends Controller
{
    //
    public function index()
    {
        // Ambil semua produk dan relasi gambarnya
        $products = Product::with('images', 'store')->get();

        return view('public.product', compact('products'));
    }
}
