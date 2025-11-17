<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    //
    public function destroy(ProductImage $image)
    {
        // Hapus file fisik
        Storage::disk('public')->delete($image->nama_file);
        $image->delete();

        return back()->with('success', 'Gambar produk berhasil dihapus.');
    }
}
