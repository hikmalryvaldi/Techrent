<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    // Field yang dapat diisi
    protected $fillable = ['product_id', 'image_path'];

    // Relasi dengan tabel products
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
