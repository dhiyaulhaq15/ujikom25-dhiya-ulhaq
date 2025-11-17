<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product', 'store')->orderBy('id', 'DESC')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required']);

        $transaction = Transaction::findOrFail($id);
        $transaction->update(['status' => $request->status]);

        return back()->with('success', 'Status transaksi berhasil diperbarui.');
    }
}
