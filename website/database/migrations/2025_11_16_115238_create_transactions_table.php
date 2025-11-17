<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('store_id');
            $table->string('buyer_name');
            $table->string('buyer_phone');
            $table->integer('qty')->default(1);
            $table->integer('total_price');

            // status transaksi
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }
};
