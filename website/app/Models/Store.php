<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    // protected $fillable = ['nama_toko','deskripsi','gambar','kontak_toko','alamat','user_id'];
    protected $fillable = ['nama_toko', 'deskripsi', 'kontak_toko', 'alamat', 'gambar', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'toko_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
