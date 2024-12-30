<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['product_id', 'discount_value', 'start_date', 'end_date'];

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected static function booted()
    {
        static::creating(function ($discount) {
            $discount->start_date = now();
        });
    }
}
