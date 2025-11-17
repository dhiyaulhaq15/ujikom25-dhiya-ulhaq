<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeCotroller extends Controller
{
    //
    public function index()
    {
        $products = Product::with(['category', 'store', 'images'])->get();
        $stores = Store::latest()->take(6)->get();

        return view('public.homepage', compact('products', 'stores'));
    }

    public function storeMember()
    {
        return view('member.dashboard');
    }
}
