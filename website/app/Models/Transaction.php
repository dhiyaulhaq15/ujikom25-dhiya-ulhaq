<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'product_id',
        'store_id',
        'buyer_name',
        'buyer_phone',
        'qty',
        'total_price',
        'status'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
