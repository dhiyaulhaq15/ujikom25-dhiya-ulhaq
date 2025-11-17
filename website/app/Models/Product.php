<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama_produk', 'kategori_id', 'harga', 'stok', 'deskripsi', 'toko_id', 'tanggal_upload'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'toko_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'produk_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
