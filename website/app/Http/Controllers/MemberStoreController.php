<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberStoreController extends Controller
{
    //
    // public function dashboard()
    // {
    //     $store = Store::where('user_id', Auth::id())->first();

    //     // Jika belum punya toko → tampilkan tombol ajukan toko
    //     if (!$store) {
    //         return view('member.no-store');
    //     }

    //     // Jika sudah ajukan tapi menunggu konfirmasi admin
    //     if ($store->status === 'pending') {
    //         return redirect()->route('store.pending');
    //     }

    //     // Jika toko sudah aktif → tampilkan dashboard produk
    //     $products = Product::where('toko_id', $store->id)->get();

    //     return view('member.dashboard', compact('store', 'products'));
    // }

    // public function dashboard()
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
    // }

    // public function dashboard()
    // {
    //     $store = Store::where('user_id', Auth::id())->first();

    //     dd([
    //         'auth_id' => Auth::id(),
    //         'store' => $store
    //     ]);

    //     // Belum punya toko
    //     if (!$store) {
    //         return view('member.no-store');
    //     }

    //     // Pending
    //     if ($store->status === 'pending') {
    //         return view('member.store-pending', compact('store'));
    //     }

    //     // Nonaktif
    //     if ($store->status === 'inactive') {
    //         return view('member.store-inactive', compact('store'));
    //     }

    //     // Aktif
    //     if ($store->status === 'active') {
    //         $products = Product::where('toko_id', $store->id)->get();
    //         return view('member.dashboard', compact('store', 'products'));
    //     }
    // }


    public function create()
    {
        return view('member.store-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'kontak_toko' => 'required',
            'alamat' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('store_images', 'public');
        }

        Store::create([
            'nama_toko' => $request->nama_toko,
            'deskripsi' => $request->deskripsi,
            'kontak_toko' => $request->kontak_toko,
            'alamat' => $request->alamat,
            'gambar' => $gambar,
            'user_id' => Auth::id(),
            'status' => 'pending'
        ]);

        return redirect()->route('store.pending');
    }

    public function pending()
    {
        $store = Store::where('user_id', Auth::id())->first();
        return view('member.store-pending', compact('store'));
    }

    public function edit()
    {
        $store = Store::where('user_id', Auth::id())->first();

        if (!$store) {
            return redirect()->route('member.dashboard')
                ->with('error', 'Anda belum memiliki toko.');
        }

        return view('member.store-edit', compact('store'));
    }

    public function update(Request $request)
    {
        $store = Store::where('user_id', Auth::id())->first();

        if (!$store) {
            return redirect()->route('member.dashboard')
                ->with('error', 'Anda belum memiliki toko.');
        }

        $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'kontak_toko' => 'required',
            'alamat' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('store_images', 'public');
            $store->gambar = $path;
        }

        $store->nama_toko = $request->nama_toko;
        $store->deskripsi = $request->deskripsi;
        $store->kontak_toko = $request->kontak_toko;
        $store->alamat = $request->alamat;

        $store->save();

        return redirect()->route('member.dashboard')
            ->with('success', 'Informasi toko berhasil diperbarui.');
    }
}
