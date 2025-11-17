<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    // public function index()
    // {
    //     $store = Store::with(['products.images'])
    //         ->where('user_id', Auth::id())
    //         ->first();

    //     $products = $store ? $store->products : collect();

    //     return view('member.dashboard', compact('store', 'products'));
    // }

    // public function index()
    // {
    //     $store = Store::where('user_id', Auth::id())->first();

    //     if (!$store) {
    //         return view('member.no-store');
    //     }

    //     if ($store->status === 'pending') {
    //         return view('member.store-pending');
    //     }

    //     if ($store->status === 'inactive') {
    //         return view('member.store-inactive');
    //     }

    //     if ($store->status === 'active') {
    //         $products = Product::where('toko_id', $store->id)->get();
    //         return view('member.dashboard', compact('store', 'products'));
    //     }

    //     // fallback (seharusnya tidak sampai sini)
    //     return 'Status toko tidak dikenali';
    // }

    public function index()
    {
        $store = Store::where('user_id', Auth::id())->first();

        // belum punya toko
        if (!$store) {
            return view('member.no-store');
        }

        // pending → kirim $store ke view pending
        if ($store->status === 'pending') {
            return view('member.store-pending', compact('store'));
        }

        // inactive → kirim $store ke view inactive
        if ($store->status === 'inactive') {
            return view('member.store-inactive', compact('store'));
        }

        // active → kirim store + products
        if ($store->status === 'active') {
            $products = Product::where('toko_id', $store->id)->get();
            return view('member.dashboard', compact('store', 'products'));
        }

        // fallback
        return view('member.no-store');
    }
}
