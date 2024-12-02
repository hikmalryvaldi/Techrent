<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'brand',
        'category_id',
        'rental_count'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function featuredProduct()
    {
        return $this->hasOne(FeaturedProduct::class, 'product_id');
    }
}
