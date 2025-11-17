<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    //
    public function index()
    {
        $stores = Store::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kontak_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('stores', 'public');
        }

        Store::create($validated);

        return redirect()->route('stores.index')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function edit(Store $store)
    {
        $users = User::all();
        return view('admin.stores.edit', compact('store', 'users'));
    }

    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kontak_toko' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('gambar')) {
            if ($store->gambar && Storage::disk('public')->exists($store->gambar)) {
                Storage::disk('public')->delete($store->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('stores', 'public');
        }

        $store->update($validated);

        return redirect()->route('stores.index')->with('success', 'Data toko berhasil diperbarui.');
    }

    public function destroy(Store $store)
    {
        if ($store->gambar && Storage::disk('public')->exists($store->gambar)) {
            Storage::disk('public')->delete($store->gambar);
        }

        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Toko berhasil dihapus.');
    }

    // public function approve($id)
    // {
    //     $store = Store::findOrFail($id);
    //     $store->status = 'active';
    //     $store->save();

    //     return redirect()->route('stores.index')->with('success', 'Toko berhasil disetujui.');
    // }

    // public function deactivate($id)
    // {
    //     $store = Store::findOrFail($id);
    //     $store->status = 'inactive';
    //     $store->save();

    //     return redirect()->route('stores.index')->with('success', 'Toko telah dinonaktifkan.');
    // }

    public function approve(Store $store)
    {
        $store->update(['status' => 'active']);
        return back()->with('success', 'Toko disetujui.');
    }

    public function deactivate(Store $store)
    {
        $store->update(['status' => 'inactive']);
        return back()->with('success', 'Toko dinonaktifkan.');
    }
}
