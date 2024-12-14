<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_path1', 'image_path2', 'image_path3', 'image_path4', 'product_id'];

    // Relasi dengan Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
